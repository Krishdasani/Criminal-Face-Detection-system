# import required modules
import mysql.connector
import numpy as np
import cv2
import dlib
# create connection object
con = mysql.connector.connect(
host="localhost", user="root",
password="", database="criminal")

# create cursor object
cursor = con.cursor()

# assign data query
query1 = "desc info"

# executing cursor
cursor.execute(query1)

# display all records
table = cursor.fetchall()

# # describe table
# print('\n Table Description:')
# for attr in table:
# 	print(attr)

# assign data query
query2 = "select id from info order by id desc limit 1;"

# executing cursor
cursor.execute(query2)
# display all records
table = cursor.fetchall()

# fetch all columns
print('\n Table Data:')
for row in table:
	print(row[0], end=" ")
	# print(row[1], end=" ")
	# print(row[2], end=" ")
	# print(row[3], end="\n")
	
# closing cursor connection
# closing connection object
# Load the image
img = cv2.imread("Criminals/"+str(row[0])+".jpg")
# Initialize dlib's face detector (HOG-based) and then create the facial landmark predictor
detector = dlib.get_frontal_face_detector()
predictor = dlib.shape_predictor("shape_predictor_68_face_landmarks.dat")
# Run the detector and predictor on the image
faces = detector(img)
for face in faces:
    landmarks = predictor(img, face)
    # Get the coordinates of the eyes, nose, and mouth
    left_eye_x = landmarks.part(36).x
    left_eye_y = landmarks.part(36).y
    right_eye_x = landmarks.part(45).x
    right_eye_y = landmarks.part(45).y
    nose_x = landmarks.part(30).x
    nose_y = landmarks.part(30).y
    mouth_x = landmarks.part(48).x
    mouth_y = landmarks.part(48).y
    # Crop the image to remove the eyes, nose, and mouth
    #img = img[:left_eye_y, :left_eye_x]
# Save the cropped image
#cv2.imwrite("/kaggle/working/cropped_image.jpg", img)
    # Crop the image for eye
    eye_img = img[left_eye_y-50:right_eye_y+50, left_eye_x-50:right_eye_x+50]
    cv2.imwrite("Cdetails/"+str(row[0])+"cropped_eye.jpg", eye_img)
    
    # Crop the image for nose
    nose_img = img[nose_y-50:nose_y+50, nose_x-50:nose_x+50]
    cv2.imwrite("Cdetails/"+str(row[0])+"cropped_nose.jpg", nose_img)
    
    # Crop the image for mouth
    mouth_img = img[mouth_y-50:mouth_y+50, mouth_x-40:mouth_x+150]
    cv2.imwrite("Cdetails/"+str(row[0])+"cropped_mouth.jpg", mouth_img)
con.close()