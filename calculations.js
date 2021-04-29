function showResult()
{
    var mil = document.getElementById("mileage");
    var milVal = parseFloat(mil.value);
    var avg = document.getElementById("average");
    var avgVal = parseFloat(avg.value);
    var fuelPrice = document.getElementById("fuelprice");
    var fuelPriceVal = parseFloat(fuelPrice.value);
    var output = document.getElementById("output");

    var result = fuelPriceVal * (( milVal * avgVal) / 100);

    output.value = result;
}
