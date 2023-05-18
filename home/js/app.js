
const readBooks = document.querySelector('.books');
const home = document.querySelector('.home');
const trending = document.querySelector('.trending');
const featured = document.querySelector('.featured');



home.addEventListener('click',()=>{
    getBooks();
})

trending.addEventListener('click',()=>{
    getTrends();
})
document.addEventListener('DOMContentLoaded',()=>{
    getBooks();   
})

async function getTrends(){
        const endpoint = new URL(`http://localhost/php_projects/Library_Management_System/api/user/readBooks.php`);
        const response = await fetch(endpoint);
        
        if(response.status==404){
            console.log("Error.....");
        }
        const data = await response.json();
        const trends = data.filter((e)=>{
            return e['dCOunt']>3;
        });
        console.log(trends);
}



async function getBooks(){
    const endpoint = new URL(`http://localhost/php_projects/Library_Management_System/api/user/readBooks.php`);
    const response = await fetch(endpoint);
    
    if(response.status==404){
        console.log("Error.....");
    }
    const data = await response.json();

    const books = data.map((e)=>{
        if(e['dCount']==null){
            e['dCount']=0;
        }
        return(
            `
            <a href="">
                <div class="book-card">
                    <img src="./images/b19.jpg" alt="Picture">
                    <p class="book-name">${e['book_name']}</p>
                    <p class="author">${e['author']}</p>
                    <div class="elements">
                        <p class="downloads">${e['dCount']}</p>
                        <p class="star">star</p>
                    </div>
                </div>
            </a>
            `
        );
    });

    const readBooks = document.querySelector('.books');
    const allBooks = books.join("");
    readBooks.innerHTML = allBooks; 
}