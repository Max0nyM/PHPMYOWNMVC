$(document).ready(function() {
// Attach a submit handler to the form
function butonClick( event ) {
 console.log('test');
$url = document.getElementsByTagName("input")[0].value;
 $.ajax({
  url: "/api/shortUrl",
  method: "POST",
  data: { url: $url},
}).done(function(response) {
try {
rez = JSON.parse(response);
if(rez["error"]==false){
document.getElementsByTagName("input")[0].value = (decodeURIComponent(rez["message"]));
}
} catch(error) {
   document.getElementById('bg-danger').innerHTML+=(decodeURIComponent(response));}

}).fail(function( jqXHR, textStatus ) {
document.getElementById('bg-danger').innerHTML+=textStatus;
});
}

document.getElementById('url').onclick = butonClick;
});