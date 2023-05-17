

document.addEventListener('DOMContentLoaded',()=>{
    getBooks();
})



async function getBooks(){
    const endpoint = new URL(`http://localhost/php_projects/Library_Management_System/api/user/readBooks.php`);
    const response = await fetch(endpoint);
    
    const data = await response.json();

    // const books = JSON.parse(data)
    console.log(data);

}