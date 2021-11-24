const cocoSsd = require('@tensorflow-models/coco-ssd');
const processImage = require('./process-image');

(async () => {
  if (process.argv.length < 3) throw 'No image specified.';

  const imgTensor = await processImage(process.argv[2]);

  const model = await cocoSsd.load();

  const predictions = await model.detect(imgTensor);

  console.log(JSON.stringify(predictions, null, 2));
})();
