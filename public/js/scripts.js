function init() {
    document.addEventListener("DOMContentLoaded", function () {
        if (isAuthenticated) {
            loggedUserUI()
        } else {
            guestUserUI()
        }
    });
}



function guestUserUI() {

    document.querySelector("#NotRegistredYet").addEventListener("click", function (event) {
        console.log("PULSANDO");
        event.preventDefault();
        document.querySelector(".loginOverlay").style.display = "none";
        document.querySelector(".registerOverlay").style.display = "block";
    });


    document.querySelector("#AlreadyRegistred").addEventListener("click", function (event) {
        event.preventDefault();
        console.log("PULSANDO1");
        document.querySelector(".registerOverlay").style.display = "none";
        document.querySelector(".loginOverlay").style.display = "block";
    });
}



function loggedUserUI() {
    addTransactionForm();
    scheduleTransaction();
    deleteTransactions();
}


function addTransactionForm() {

    const datePicker = document.getElementById('datePikcer');
    const dailyCheckBox = document.querySelector("#dailyCheckBox");
    const monthlyCheckBox = document.querySelector("#monthlyCheckBox");

    document.querySelector("#dailyCheckBox").addEventListener("change", function () {
        if (this.checked){
            datePicker.disabled = true
            monthlyCheckBox.checked = false
        }
        else
            datePicker.disabled = false
    })

    document.querySelector("#monthlyCheckBox").addEventListener("change", function () {
        if (this.checked){
            datePicker.disabled = true
            dailyCheckBox.checked = false
        }
        else
            datePicker.disabled = false
    })





    document.addEventListener("DOMContentLoaded", function () {
        const switchLabel = document.querySelector('.switch-label.add-transaction');
        const switchInput = document.querySelector('#switchTransactions');

        if (switchInput) {
            switchInput.addEventListener('change', function () {
                if (this.checked) {
                    switchLabel.innerText = 'INCOME';
                } else {
                    switchLabel.innerText = 'EXPENSE';
                }
            });
        }

        const switchLabel2 = document.querySelector('.switch-label.program-transaction');
        const switchInput2 = document.querySelector('#switchScheduledTransactions');

        document.querySelector('.switch-label.program-transaction').addEventListener('change', function () {
            if (this.checked) {
                switchLabel2.innerText = 'INCOME';
            } else {
                switchLabel2.innerText = 'EXPENSE';
            }
        });


        // Date Picker and Checkbox Handling

        if (datePicker) {
            datePicker.min = new Date().toISOString().split('T')[0];

            function handleCheckboxChange(checkbox) {
                const dateInput = document.getElementById('datePikcer');
                dateInput.disabled = checkbox.checked;

                if (checkbox.checked) {
                    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                    checkboxes.forEach(cb => {
                        if (cb !== checkbox) {
                            cb.checked = false;
                        }
                    });
                }
            }
        }
    })

}

function scheduleTransaction() {

    document.querySelector("#create-prog-transaction-button").addEventListener("click", function (event) {
        event.preventDefault();
        document.querySelector(".newProgrammedTransaction").style.display = "block";
    });


    document.getElementById("remove-prog-transaction-button").addEventListener("click", function () {
        document.querySelector("#deleteScheduledTransactionOverlay").style.display = "block";
    });


    document.querySelector(".closePopup.ProgramTransaction").addEventListener("click", function () {
        document.getElementById("deleteScheduledTransactionOverlay").style.display = "none";
    });


    document.querySelector(".closePopup.newProgrammedTransaction").addEventListener("click", function () {
        document.querySelector(".overlay.newProgrammedTransaction").style.display = "none";
    });


}

function deleteTransactions() {
    const deleteTransactionButton = document.getElementById('deleteTransactionButton');

    if (deleteTransactionButton) {
        deleteTransactionButton.addEventListener('click', function (event) {
            event.preventDefault();
            document.getElementById('deleteTransactionForm').submit();
        });
    }
}



init()

