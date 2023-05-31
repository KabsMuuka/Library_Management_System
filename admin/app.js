const bookbtn = document.querySelector('.book-btn');
const card = document.querySelector('.addBook');
const cancel = document.querySelector('.btn-cancel');
const add = document.querySelector('.add');
const deleteBtn = document.querySelector('.delete');
const edit = document.querySelector('.edit');

bookbtn.addEventListener('click',()=>{
   card.classList.add('showCard');
})

cancel.addEventListener('click',()=>{
    card.classList.remove('showCard');
})

add.addEventListener('click',()=>{
    card.classList.remove('showCard');
})

                    // <input class="bookName" name="book_name" type="text"  placeholder="Book Name" required>
                    // <input class="author" name="author" type="text"  placeholder="Author" required>
                    // <input class="year" name="year_published"  type="date" required>
                    // <textarea class="description" name="description"  placeholder="Description" required></textarea>
                    // <label for="image-file" required>Cover Image</label>
                    // <input type="file"  name="image-file" id="file" required>
                    // <label for="book-file">Book</label>
                    // <input type="file"  name="book-file" id="file" required>
                    // <button class="add"type="submit" name="add">Add</button>

deleteBtn.addEventListener('click',(e)=>{
    e.preventDefault();

})

let bookName = document.querySelector('.bookName');
let author = document.querySelector('.author');
let decription = document.querySelector('.description');
let image = document.querySelector('#image-file');
let book = document.querySelector('#book-file');
let bookId = document.querySelector('.book_id');

edit.addEventListener('click',(e)=>{
    e.preventDefault();
    card.classList.add('showCard');
    console.log(bookId);
})

