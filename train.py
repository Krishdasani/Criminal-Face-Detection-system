# import cv2
# import numpy as np
# import os
# import tensorflow as tf
# from tensorflow.keras.models import Sequential
# from tensorflow.keras.layers import Conv2D, MaxPooling2D, Dropout, Flatten, Dense
# from tensorflow.keras.preprocessing.image import ImageDataGenerator
# from tensorflow.keras.applications.resnet50 import ResNet50
# from tensorflow.keras.applications.resnet50 import preprocess_input
# from sklearn.metrics.pairwise import cosine_similarity
# # Set the directory containing the face database images
# database_dir = 'faces'

# # Define the input size of the model
# input_size = (128, 128)

# # Define the batch size for training and validation data
# batch_size = 32

# # Define the number of epochs for training
# num_epochs = 10

# # Define the learning rate for the optimizer
# learning_rate = 0.001

# # Define the number of classes (i.e. number of people in the database)
# num_classes = len(os.listdir(database_dir))

# # Define the model architecture
# model = Sequential([
#     Conv2D(32, (3, 3), activation='relu', input_shape=(input_size[0], input_size[1], 3)),
#     MaxPooling2D(pool_size=(2, 2)),
#     Dropout(0.25),
#     Conv2D(64, (3, 3), activation='relu'),
#     MaxPooling2D(pool_size=(2, 2)),
#     Dropout(0.25),
#     Conv2D(128, (3, 3), activation='relu'),
#     MaxPooling2D(pool_size=(2, 2)),
#     Dropout(0.25),
#     Flatten(),
#     Dense(512, activation='relu'),
#     Dropout(0.5),
#     Dense(num_classes, activation='softmax')
# ])

# # Compile the model
# model.compile(optimizer=tf.keras.optimizers.Adam(lr=learning_rate),
#               loss='categorical_crossentropy',
#               metrics=['accuracy'])

# # Define the data generators for loading the training and validation data
# train_data_gen = ImageDataGenerator(preprocessing_function=preprocess_input,
#                                     rotation_range=20,
#                                     width_shift_range=0.1,
#                                     height_shift_range=0.1,
#                                     zoom_range=0.2,
#                                     horizontal_flip=True)

# train_generator = train_data_gen.flow_from_directory(database_dir,
#                                                      target_size=input_size,
#                                                      batch_size=batch_size,
#                                                      class_mode='categorical')

# # Train the model
# model.fit(train_generator, epochs=num_epochs)

# # Save the model
# model.save('feature_based_face_recognition_model.h5')
import cv2
import numpy as np
import os
import tensorflow as tf
from tensorflow.keras.models import Sequential
from tensorflow.keras.layers import Conv2D, MaxPooling2D, Dropout, Flatten, Dense
from tensorflow.keras.preprocessing.image import ImageDataGenerator
from tensorflow.keras.applications.resnet50 import ResNet50
from tensorflow.keras.applications.resnet50 import preprocess_input
from sklearn.metrics.pairwise import cosine_similarity
database_dir = 'faces'
# Define the input size of the model
input_size = (128, 128)

# Define the batch size for training and validation data
batch_size = 32

# Define the number of epochs for training
num_epochs = 10

# Define the learning rate for the optimizer
learning_rate = 0.001

# Define the number of classes (i.e. number of people in the database)
num_classes = len(os.listdir(database_dir))

# Define the model architecture
model = Sequential([
    Conv2D(32, (3, 3), activation='relu', input_shape=(input_size[0], input_size[1], 3)),
    MaxPooling2D(pool_size=(2, 2)),
    Dropout(0.25),
    Conv2D(64, (3, 3), activation='relu'),
    MaxPooling2D(pool_size=(2, 2)),
    Dropout(0.25),
    Conv2D(128, (3, 3), activation='relu'),
    MaxPooling2D(pool_size=(2, 2)),
    Dropout(0.25),
    Flatten(),
    Dense(512, activation='relu'),
    Dropout(0.5),
    Dense(num_classes, activation='softmax')
])

# Compile the model
model.compile(optimizer=tf.keras.optimizers.Adam(lr=learning_rate),
              loss='categorical_crossentropy',
              metrics=['accuracy'])

# Define the data generators for loading the training and validation data
train_data_gen = ImageDataGenerator(preprocessing_function=preprocess_input,
                                    rotation_range=20,
                                    width_shift_range=0.1,
                                    height_shift_range=0.1,
                                    zoom_range=0.2,
                                    horizontal_flip=True)

train_generator = train_data_gen.flow_from_directory(database_dir,
                                                     target_size=input_size,
                                                     batch_size=batch_size,
                                                     class_mode='categorical')

# Train the model
model.fit(train_generator, epochs=num_epochs)

# Save the model
model.save('feature_based_face_recognition_model.h5')
