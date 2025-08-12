Criminal Face Detection System
Python-based system for real-time face detection and recognition. Uses deep-learning detectors (SSD/ResNet) and embeddings (FaceNet/VGGFace) to match faces against a known gallery. Includes a minimal PHP web UI for uploads and viewing.

Ethics & Use: For research/education only. If deploying, follow local laws, obtain consent where required, and document limitations/bias.

Features
Real-time face detection from webcam or video.

Face recognition via embeddings + classifier.

Simple PHP pages: upload.php, view.php, view2.php, try.php.

Large model files handled with Git LFS (.h5, .dat, .zip).

Quick Start
1) Clone and fetch LFS assets
bash
Copy
Edit
# SSH (recommended) or use HTTPS
git clone git@github.com:Krishdasani/Criminal-Face-Detection-system.git
cd Criminal-Face-Detection-system
git lfs install
git lfs pull
2) Create a Python env & install deps
bash
Copy
Edit
# Windows (CMD/PowerShell)
py -3 -m venv .venv
.venv\Scripts\activate
pip install --upgrade pip
If requirements.txt exists:

bash
Copy
Edit
pip install -r requirements.txt
Otherwise, common packages:

bash
Copy
Edit
pip install numpy opencv-python dlib tensorflow keras scikit-learn imutils pandas
Windows dlib tip: install “Visual Studio Build Tools (C++)”.
Linux: sudo apt install build-essential cmake libboost-all-dev before pip install dlib.

3) Run the demo
bash
Copy
Edit
python video.py
# examples (if supported):
# python video.py --camera 0
# python video.py --input path/to/video.mp4
(Optional) PHP web UI
Use XAMPP/WAMP or any PHP server.

Place this folder in the web root or map a vhost.

Open upload.php, view.php, view2.php. Adjust paths if they invoke Python.

Repository Structure (short)
csharp
Copy
Edit
.
├─ Cdetails/                              # sample images / case files
├─ video.py                               # real-time detection/demo
├─ upload.php / view.php / view2.php / try.php
├─ facenet_keras.h5                       # (LFS)
├─ facenet_keras_weights.h5               # (LFS)
├─ vggface.h5                             # (LFS)
├─ feature_based_face_recognition_model.h5# (LFS)
├─ my_model.h5                            # (LFS)
├─ shape_predictor_68_face_landmarks.dat  # (LFS recommended)
└─ README.md
After cloning run: git lfs pull to download large files.

Troubleshooting
Large files: Ensure git lfs install && git lfs pull after cloning.

Windows + OneDrive locks: Keep your working copy outside OneDrive (e.g., C:\Repos\...).

Low FPS: Use GPU TensorFlow, reduce frame size (e.g., width 640), or batch embedding computation.

License
Add a license in LICENSE (MIT is a common choice).

Maintainer
Krish Dasani
