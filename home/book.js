// const download = document.querySelector('.download');
// const book_id = document.querySelector('.book_id');

// console.log("Hello")
// const data = {
//     book_id: book_id.innerHTML
//   };
// const proxyUrl = 'https://cors-anywhere.herokuapp.com/';
//   console.log(book_id.innerHTML);
//   console.log(download);
// download.addEventListener('click',(e)=>{
//     e.preventDefault();
//     fetch("https://schoollibray.000webhostapp.com/api/user/createDownload.php", {
//   method: "POST",
//   body: JSON.stringify({
//     "book_id": book_id.innerHTML,
//   }),
//   headers: {
//     "Content-type": "application/json; charset=UTF-8"
//   }
// }).then(response => {
//     if (response.ok) {
//       return response.json(); // process the response data
//     } else {
//       throw new Error('Request failed with status ' + response.status);
//     }
//   })
//   .then(responseData => {
//     // handle the response data
//     console.log(responseData);
//   })
//   .catch(error => {
//     // handle any errors that occurred during the request
//     console.error(error);
//   });


//     console.log(book_id);
//     console.log(download);
// })
  

// <?php
//                 ini_set('display_errors', 1);
//                 error_reporting(E_ALL);
//                 if(isset($_POST['download'])){
//                     try{
//                         // API endpoint URL
//                         $url = 'https://schoollibray.000webhostapp.com/api/user/createDownload.php';
                
//                         // Initialize curl
//                         $ch = curl_init();
                
                        
//                         $data=array(
//                             "book_id"=>$bookId
//                         );
                
//                         // Set curl options
//                         curl_setopt($ch, CURLOPT_URL, $url);
//                         curl_setopt($ch, CURLOPT_POST, true);
//                         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
//                         curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//                         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//                         curl_setopt($ch, CURLOPT_VERBOSE, true);
                
                
//                         // Execute curl and get response
//                         $response = curl_exec($ch);
                
                        
//                         // Close curl
//                         curl_close($ch);
//                         echo $response;
//                         }catch(PDOException $e){
//                             echo $e->getMessage();
//                         }
//                 }
//             ?>
  