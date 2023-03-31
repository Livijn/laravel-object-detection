require('@tensorflow/tfjs-backend-cpu');
require('@tensorflow/tfjs-backend-webgl');
const cocoSsd = require('@tensorflow-models/coco-ssd');
const processImage = require('./process-image');
const debugImage = require("./debug-image");
const { loadImage } = require('canvas')

if (process.argv.length < 3) throw 'No image specified.';

(async () => {
  const image = await processImage(process.argv[2]);

  const model = await cocoSsd.load();

  const predictions = await model.detect(image.tensor);
  
  const loadedImage = await loadImage(image.buffer);

  if (parseInt(process.env.DEBUG_IMAGE)) {
    debugImage(loadedImage, predictions);
  }

  console.log(JSON.stringify({
    width: loadedImage.naturalWidth,
    height: loadedImage.naturalHeight,
    predictions,
  }, null, 2));
})();
