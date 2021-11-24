const cocoSsd = require('@tensorflow-models/coco-ssd');
const processImage = require('./process-image');
const debugImage = require("./debug-image");

if (process.argv.length < 3) throw 'No image specified.';

(async () => {
  const image = await processImage(process.argv[2]);

  const model = await cocoSsd.load();

  const predictions = await model.detect(image.tensor);

  if (parseInt(process.env.DEBUG_IMAGE)) {
    debugImage(image.buffer, predictions);
  }

  console.log(JSON.stringify(predictions, null, 2));
})();
