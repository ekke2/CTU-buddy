fetch('WeeklySchedule.txt')


fs.readFile('WeeklySchedule.txt', (err, data) => {
    if (err) throw err;
 
    var alltext = data.toString();
})

ArrOfLines = alltext.split('/n')

for (var i=0 ; i<ArrOfLines.length; i++ ){
    ArrOfLines[i] = ArrOfLines[i].split("/t");
}

//Day 1:
//Cell1-1
NewCell = document.getElementById("1-1")
    NewCell = ArrOfLines[1,1] + "/n/n" + ArrOfLines[1,2]; //To include the date
NewCell = document.getElementById("1-2")
    OneTwo.innerHTML = "test"
NewCell = document.getElementById("1-3")
    NewCell.innerHTML = 'test'
document.getElementById("1-4").innerHTML = ArrOfLines[1,5]
document.getElementById("1-5").innerHTML = ArrOfLines[1,6]


/*
const cell11 = document.getElementById("1-1");
cell.innerHTML = alltext.substr(0,alltext.indexOf(" ",4)-1)

let newtext = alltext.substr[alltext.indexOf(" ")+1]

document.getElementById("").innerHTML = newtext.substr[]*/