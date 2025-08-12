
import cv2
import numpy as np
import os
# x import pickle
# import face_recognition

# Define the directory containing the face database images
database_dir = 'Criminals'

# Load the first face recognition model
model_file1 = 'opencv_face_detector_uint8.pb'
config_file1 = 'opencv_face_detector.pbtxt'
net1 = cv2.dnn.readNetFromTensorflow(model_file1, config_file1)

# Load the second face recognition model
model_file2 = 'res10_300x300_ssd_iter_140000_fp16.caffemodel'
config_file2 = 'deploy.prototxt'
net2 = cv2.dnn.readNetFromCaffe(config_file2, model_file2)
#print(net2.dump())

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

# Load the input face image
input_img = cv2.imread('search/search.jpg')
#print(input_img)

# Extract the facial features from the input image
input_features = extract_features(input_img)
#print(input_features)
if input_features is not None:
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
            distance = np.dot(input_features, current_features)

            # Update the best match if the current distance is higher than the previous best match
            if distance > best_match_score:
                best_match_filename = filename
                best_match_score = distance
                #print(filename,distance)
               
    # Check if a match was found
if best_match_filename is None or best_match_score < 0.8:
    print("No match found.")
else:
    # Print the filename of the most similar image and its similarity score
    # print(best_match_score)
    similarity_percentage = best_match_score * 100
   # print("Similarity Percentage: {:.2f}%".format(similarity_percentage))

    #print("Best match: {} (score: {:.2f})".format(best_match_filename, similarity_percentage))
    print(best_match_filename)

