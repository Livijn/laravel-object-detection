const fs = require('fs');
const { createCanvas } = require('canvas')

module.exports = (image, predictions) => {
  const canvas = createCanvas(image.width, image.height)
  const ctx = canvas.getContext('2d')

  ctx.drawImage(image, 0, 0)

  ctx.lineWidth = 8;
  ctx.strokeStyle = 'green';
  ctx.font = '20px Arial'

  predictions.forEach(prediction => {
    ctx.strokeRect(prediction.bbox[0], prediction.bbox[1], prediction.bbox[2], prediction.bbox[3]);

    drawTextBG(ctx, prediction.class + ': ' + prediction.score, prediction.bbox[0], prediction.bbox[1]);
  })

  const out = fs.createWriteStream(__dirname + '/../debug-image.png')
  const stream = canvas.createPNGStream()
  stream.pipe(out)
};

const drawTextBG = (ctx, txt, x, y) => {
  ctx.save();
  ctx.textBaseline = 'top';
  ctx.fillStyle = '#f50';

  const width = ctx.measureText(txt).width + 8;

  ctx.fillStyle = 'green';

  ctx.fillRect(x, y, width, 28);

  ctx.fillStyle = '#000';

  ctx.fillText(txt, x, y);

  ctx.restore();
}
