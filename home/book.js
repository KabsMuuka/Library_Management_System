const download = document.querySelector('.download');
const book_id = document.querySelector('.book_id');


const data = {
    book_id: book_id.innerHTML
  };
  
  console.log(book_id.innerHTML);
  console.log(download);
download.addEventListener('click',(e)=>{
    fetch('https://schoollibray.000webhostapp.com/api/user/createDownload.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
    .then(response => response.json())
    .then(result => {
      console.log(result);
    })
    .catch(error => {
      console.error(error);
    });

    console.log(book_id);
    console.log(download);
})
  
  