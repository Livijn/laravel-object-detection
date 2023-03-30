#!/usr/bin/env python3

import sys
import cv2
import math
import numpy as np
import mediapipe as mp
from PIL import Image
import requests
import json
from google.protobuf.json_format import MessageToJson
import os

TMP_IN_IMG = "tmp/in.jpg"
TMP_OUT_IMG = "tmp/out.jpg"
TMP_OUT_JSON = "tmp/out.json"

def delete_file(file):
    if os.path.exists(file):
        os.remove(file)
    
def download(image):
    print(f'Downloading image {image}:')
    with open(TMP_IN_IMG, 'wb') as f:
        f.write(requests.get(image).content)

mp_face_detection = mp.solutions.face_detection
mp_drawing = mp.solutions.drawing_utils 
drawing_spec = mp_drawing.DrawingSpec(thickness=1, circle_radius=1)
output_debug = sys.argv[2]

delete_file(TMP_IN_IMG)
delete_file(TMP_OUT_IMG)
delete_file(TMP_OUT_JSON)

download(sys.argv[1])

image = cv2.imread(TMP_IN_IMG)

# Run MediaPipe Face Detection with short range model.
with mp_face_detection.FaceDetection(
    min_detection_confidence=0.4, model_selection=0) as face_detection:
    # Convert the BGR image to RGB and process it with MediaPipe Face Detection.
    results = face_detection.process(cv2.cvtColor(image, cv2.COLOR_BGR2RGB))
    
    if results.detections:
        jsonDetection = MessageToJson(results.detections[0])
        
        with open(TMP_OUT_JSON, 'a') as f:
            print(jsonDetection, file=f)

        if output_debug == "1":
            annotated_image = image.copy()

            for detection in results.detections:
              mp_drawing.draw_detection(annotated_image, detection)

            cv2.imwrite(TMP_OUT_IMG, annotated_image)
