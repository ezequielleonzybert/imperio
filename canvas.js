c = document.getElementById("canvas");
let w = c.width = document.documentElement.clientWidth;
let h = c.height = document.documentElement.clientHeight;
let ctx = c.getContext("2d");

// player atributes
let name = document.getElementById('name').value;
let radius = 20;
let position = {
    x: document.getElementById('x').value,
    y: document.getElementById('y').value
}

// drawing variables
ctx.font = "15px Arial";
let name_x = position.x - ctx.measureText(name).width / 2;
let name_y = position.y - radius * 1.5;

//DRAW STUFF
ctx.translate(w / 2, h / 2)
ctx.fillStyle = "#555555";
ctx.fillText(name, name_x , name_y);
ctx.beginPath();
ctx.arc(0, 0, radius, 0, 2 * Math.PI);
ctx.fill();

c.addEventListener('mousedown', event =>{ 
    let x = event.clientX;
    let y = event.clientY;
    fetch(`http://localhost/update_server.php?x=${x}&y=${y}&name=${name}`);
});

    // fetch("http://localhost/update_server.php", {
    //     method: "POST",
    //     headers: {
    //         "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    //     },
    //
    //     body: `x=${x}&y=${y}`,
    // })
    //     .then((response) => response.text())
    //     .then((res) => (document.getElementById("main").innerHTML = res));