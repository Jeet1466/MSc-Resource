document.addEventListener("DOMContentLoaded", function() {
    let menu = document.querySelector(".nav-links");
    let burger = document.querySelector(".hamburger");

    burger.addEventListener("click", function() {
        menu.classList.toggle("show");
    });

    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;

    // Check for saved theme in localStorage
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        body.classList.add(savedTheme);
        if (themeToggle) {
            themeToggle.checked = savedTheme === 'dark-mode';
        }
    }

    if (themeToggle) {
        themeToggle.addEventListener('change', () => {
            if (themeToggle.checked) {
                body.classList.remove('light-mode');
                body.classList.add('dark-mode');
                localStorage.setItem('theme', 'dark-mode');
            } else {
                body.classList.remove('dark-mode');
                body.classList.add('light-mode');
                localStorage.setItem('theme', 'light-mode');
            }
        });
    }

    // Subject Handling
    const subjectData = {
        "Semester 1": ["Programming using C", "Mathematics", "Fundamentals of Computers", "Communication Skills in English", "AEC", "SEC", "VAC"],
        "Semester 2": ["Programming using C", "Mathematics", "Introduction to DBMS", "AEC", "SEC", "VAC"],
        // Add more semesters and subjects here if needed
    };

    const typeSelect = document.querySelector('select[name="type"]');
    const semesterSelect = document.getElementById("semester");
    const subjectSelect = document.getElementById("subject");

    function updateSubjects() {
        const semester = semesterSelect.value;
        const type = typeSelect.value;

        // Clear previous options
        subjectSelect.innerHTML = '<option value="">-- Select Subject --</option>';

        if (type === "syllabus") {
            subjectSelect.disabled = true;  // 🔥 disable subject field
        } else {
            subjectSelect.disabled = false;
            if (semester && subjectData[semester]) {
                const subjects = subjectData[semester];
                subjects.forEach(function(subject) {
                    const option = document.createElement("option");
                    option.value = subject;
                    option.textContent = subject;
                    subjectSelect.appendChild(option);
                });
            }
        }
    }

    if (typeSelect && semesterSelect && subjectSelect) {
        typeSelect.addEventListener("change", updateSubjects);
        semesterSelect.addEventListener("change", updateSubjects);
    }
});

function toggleSubjects(id) {
    const element = document.getElementById(id);
    if (element.style.display === "none") {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
}

function toggleFiles(id) {
    const element = document.getElementById(id);
    if (element.style.display === "none") {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
}
