const numItemsToGenerate = 100; //how many gallery items you want on the screen
const numImagesAvailable = 242; //how many total images are in the collection you are pulling from
const imageWidth = 222; //your desired image width in pixels
const imageHeight = 222; //desired image height in pixels
const collectionID = 1163637; //the collection ID from the original url
const $galleryContainer = document.querySelector('.gallery-container');

function renderGalleryItem(randomNumber){
  fetch(`https://source.unsplash.com/collection/${collectionID}/${imageWidth}x${imageHeight}/?sig=${randomNumber}`) 
    .then((response)=> {    
      let galleryItem = document.createElement('div');
      galleryItem.classList.add('gallery-item');
      galleryItem.innerHTML = `
        <img class="gallery-image" src="${response.url}" alt="gallery image"/>
      `
      $galleryContainer.appendChild(galleryItem);
    })
}
let rndNumbers = [];
function notRepeat(rndNumber) {
    rnd
    if (rndNumbers.includes(rndNumber)) {
        
    }
}
for(let i=0;i<numItemsToGenerate;i++){
  let randomImageIndex = Math.floor(Math.random() * numImagesAvailable)+1;
  renderGalleryItem(randomImageIndex);
}