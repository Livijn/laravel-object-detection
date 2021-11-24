const tf = require('@tensorflow/tfjs-node');
const fetch = require('node-fetch');

module.exports = async function (url) {
  const response = await fetch(url);
  const buffer = await response.buffer();

  return tf.node.decodeImage(new Uint8Array(buffer), 3);
}
