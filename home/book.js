const download = document.querySelector('.download');
const book_id = document.querySelector('.book_id');

console.log("Hello")
const data = {
    book_id: book_id.innerHTML
  };
const proxyUrl = 'https://cors-anywhere.herokuapp.com/';
  console.log(book_id.innerHTML);
  console.log(download);
download.addEventListener('click',(e)=>{
    e.preventDefault();
    fetch("https://schoollibray.000webhostapp.com/api/user/createDownload.php", {
  method: "POST",
  body: JSON.stringify({
    book_id: book_id.innerHTML,
  }),
  headers: {
    "Content-type": "application/json; charset=UTF-8"
  }
});


    console.log(book_id);
    console.log(download);
})
  
  