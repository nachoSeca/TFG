// SEARCHING TUTORS BY NAME
function myFunction() {
    // Declare variables
    let input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    let noResultsMessage = document.getElementById("noResultsMessage");

    // Remove existing no results message if present
    if (noResultsMessage) {
        noResultsMessage.parentNode.removeChild(noResultsMessage);
    }

    // Loop through all table rows, and hide those who don't match the search query
    let resultsFound = false;
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
                resultsFound = true;
            } else {
                tr[i].style.display = "none";
            }
        }
    }

    // Show no results message if no matches found
    if (!resultsFound) {
        var messageRow = table.insertRow(-1);
        var messageCell = messageRow.insertCell(0);
        messageCell.setAttribute("colspan", table.rows[0].cells.length); // Set colspan to span all columns
        messageCell.textContent = "No hay resultados";
        messageCell.style.textAlign = "center";
        messageCell.style.fontStyle = "italic";
        messageCell.id = "noResultsMessage"; // Set id for easy removal later
    }
}

// FILTERING TUTORS BY HEADING
function sortTable(n) {
    let table,
        rows,
        switching,
        i,
        x,
        y,
        shouldSwitch,
        dir,
        switchcount = 0;
    table = document.getElementById("myTable");
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
      first, which contains table headers): */
        for (i = 1; i < rows.length - 1; i++) {
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Get the two elements you want to compare,
        one from current row and one from the next: */
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /* Check if the two rows should switch place,
        based on the direction, asc or desc: */
            if (dir == "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            } else if (dir == "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            /* If a switch has been marked, make the switch
        and mark that a switch has been done: */
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // Each time a switch is done, increase this count by 1:
            switchcount++;
        } else {
            /* If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again. */
            if (switchcount == 0 && dir == "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}

// TRANSITION FOR NAVBAR
window.addEventListener('scroll', function() {
    let navbar = document.getElementById('navbar');
    let welcome = document.querySelector('.welcome');


    if (window.scrollY > 10) { // Cambia 50 al valor que desees
        navbar.classList.add('navbar-scrolled');
        navbar.setAttribute('data-bs-theme', 'dark');
        navbar.style.backdropFilter = 'blur(10px)'; // Ajusta el valor de desenfoque según sea necesario
        welcome.style.color = 'white';  


    } else {
        navbar.classList.remove('navbar-scrolled');
        navbar.removeAttribute('data-bs-theme');
        navbar.style.backdropFilter = 'none'; // Elimina el desenfoque cuando no se hace scroll
        welcome.style.color = 'black';


    }
});
