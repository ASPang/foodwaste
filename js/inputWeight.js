function individualResult() {
    var start = document.getElementById('startWeight').value;
    var end = document.getElementById('startWeight').value;
    var location = null;
    var date = null;
    var time = null;
    var dateTime = new Date();
    
    date = dateTime.getDate();
    console.log(date);
    
    console.log(dateTime);
    console.log(dateTime.Length);
    time = dateTime.substring(dateTime.length-8, dateTime.length-1);
    console.log(time);
    
    
    
}