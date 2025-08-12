import cv2
import numpy as np
import os
import sys
sys.path.append('C:/Users/HOME/Desktop/opencv')
database_dir = 'Criminals'


# Load the first face recognition model
model_file1 = 'opencv_face_detector_uint8.pb'
config_file1 = 'opencv_face_detector.pbtxt'
net1 = cv2.dnn.readNetFromTensorflow(model_file1, config_file1)

# Load the second face recognition model
model_file2 = 'res10_300x300_ssd_iter_140000_fp16.caffemodel'
config_file2 = 'deploy.prototxt'
net2 = cv2.dnn.readNetFromCaffe(config_file2, model_file2)

# Define a function to extract facial features from an image using the ResNet model
def extract_features(image):
    # Convert the image to RGB
    rgb = cv2.cvtColor(image, cv2.COLOR_BGR2RGB)

    # Resize the image to a fixed size
    target_size = (160, 160)
    resized = cv2.resize(rgb, target_size)

    # Preprocess the image for the ResNet model
    mean = np.array([127.5, 127.5, 127.5])
    std = np.array([128.0, 128.0, 128.0])
    normalized = (resized - mean) / std
    transposed = np.transpose(normalized, (2, 0, 1))
    batched = np.expand_dims(transposed, axis=0)

    # Run the image through the ResNet model to extract facial features
    net1.setInput(batched)
    features1 = net1.forward().flatten()
    net2.setInput(cv2.dnn.blobFromImage(resized, 1.0, (300, 300), (104.0, 177.0, 123.0), False, False))
    features2 = net2.forward().flatten()

    # Combine the features extracted from both models
    features = np.concatenate([features1, features2])

    # Normalize the features to be between -1 and 1
    features /= np.linalg.norm(features)

    return features

# Define the video capture object
cap = cv2.VideoCapture(0)

# Loop over the frames from the video stream
while True:
    # Read the next frame from the video stream
    ret, frame = cap.read()

    if not ret:
        # If there was an error reading the frame, break out of the loop
        break

    # Extract the facial features from the current frame
    features = extract_features(frame)

    if features is not None:
        # Initialize variables to keep track of the most similar image and its similarity score
        best_match_filename = None
        best_match_score = -1

        # Loop over all files in the directory
        for filename in os.listdir(database_dir):
            # Load the current image
            current_img = cv2.imread(os.path.join(database_dir, filename))

            # Extract the facial features from the current image
            current_features = extract_features(current_img)

            if current_features is not None:
                # Calculate the cosine distance between the features of the input and current images
                distance = np.dot(features, current_features)

                # Update the best match if the current distance is higher than the previous best match
                if distance > best_match_score:
                    best_match_filename = filename
                    best_match_score = distance

        # Check if a match was found
        if best_match_filename is None or best_match_score < 0.7:
            print("No match found.")
        else:
            # Draw a square around the detected face in the current frame
            (h, w) = frame.shape[:2]
            box = np.array([0, 0, w, h])
            cv2.rectangle(frame, (box[0], box[1]), (box[2], box[3]), (0, 255, 0), 2)
            
            # Add the best match filename as text on the frame
            text = "Best match: {}".format(best_match_filename)
            cv2.putText(frame, text, (10, 30), cv2.FONT_HERSHEY_SIMPLEX, 0.8, (0, 0, 255), 2)

    # Show the current frame with the square and text
    cv2.imshow('frame', frame)

    # Check if the 'q' key was pressed to quit the program
    if cv2.waitKey(1) & 0xFF == ord('q'):
        break

# Release the video capture object and close all windows
cap.release()
cv2.destroyAllWindows()
