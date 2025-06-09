
function toggleHeaderVisibility() {
    const searchInput = document.querySelector('.search-input');
    const tableHeader = document.getElementById('table-header');

    // Show header when there is input, otherwise hide it
    if (searchInput.value.trim() !== '') {
        tableHeader.classList.remove('hidden');
    } else {
        tableHeader.classList.add('hidden');
    }
}


// debounce func

function debounce(callback , delay){
    let timerId;
    return function(...args){
        clearTimeout(timerId);
        timerId = setTimeout(() => {
            callback.apply(this , args)
        }, delay);
    }

}




function searchPatient(query){
    $.ajax({
        method: 'GET',
        url : '/reception/search',
        data : {query : query},
        success : function (data){
            $('#patient').html(data);
        },
        error : function(xhr,status,error){

        }
    })
}
function searchMedicament(query){
    $.ajax({
        method: 'GET',
        url : '/pharmacy/search',
        data : {query : query},
        success : function (data){
            $('#medication').html(data);
        },
        error : function(xhr,status,error){

        }
    })
}

function searchPatientDoctor(query, route, parentElem) {
    return $.ajax({  // Return the AJAX request
        method: 'GET',
        url: route,
        data: { query: query },
    }).done(function(data) {
        $(parentElem).html(data);
    }).fail(function(xhr, status, error) {
        console.error("Error fetching data:", error);
    });
}


// toggleHeaderVisibility();



jQuery(document).ready(function() {
    $('.search-patient').on('keyup', function(){
        let query = $(this).val();
        if (query && query.trim() !== "")
        searchPatient(query);
    });
    $('#medication-list').on('keyup', function(){
        let query = $(this).val();
        if (query && query.trim() !== "")
        searchMedicament(query);
    });
    $('#doctor-patient-input').on('keyup', function(){
        let query = $(this).val();
        if (query && query.trim() !== "")
        searchPatientDoctor(query , '/doctor/search', '#doctor-patient');
    });


    const debouncedSearch = debounce(() => {
        const value = $('#doctor_med_input').val().trim();

        if (value === "") {
            $("#medication-list").empty();  // Clear list if empty
            return;
        }

        searchPatientDoctor(value, '/doctor/searchmed', '#medication-list').then(() => {
            // Recheck input value to ensure it hasn’t changed to empty
            if ($('#doctor_med_input').val().trim() === "") {
                $("#medication-list").empty();
            }
        });

    }, 300);


    // clear the content
    $('#doctor_med_input').on('keyup', function() {
        let query = $(this).val();
        if (query.trim() === "") {
            $("#medication-list").empty();
        }
        if (query.length > 0) {
            debouncedSearch();
        }
    });

    $('#doctor-patient-input').on('input', function(){
        toggleHeaderVisibility();
    });
    $('#search-input').on('input', function(){
        toggleHeaderVisibility();
    });
    $('#medication-list').on('input', function(){
        toggleHeaderVisibility();
    });






});




