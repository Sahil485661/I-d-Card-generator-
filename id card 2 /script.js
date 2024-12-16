document.getElementById('generateBtn').addEventListener('click', () => {
    // Get user input
    const orgName = document.getElementById('orgName').value;
    const studentName = document.getElementById('studentName').value;
    const studentId = document.getElementById('studentId').value;
    const dob = document.getElementById('dob').value;
    const address = document.getElementById('address').value;

    // Populate the ID Card Preview
    document.getElementById('previewOrgName').innerText = orgName;
    document.getElementById('previewName').innerText = studentName;
    document.getElementById('previewId').innerText = studentId;
    document.getElementById('previewDOB').innerText = dob;
    document.getElementById('previewAddress').innerText = address;

    // Handle Image Upload
    const imageInput = document.getElementById('imageInput');
    if (imageInput.files[0]) {
        const reader = new FileReader();
        reader.onload = (e) => {
            document.getElementById('previewImage').src = e.target.result;
        };
        reader.readAsDataURL(imageInput.files[0]);
    }
});

// Download as PDF
document.getElementById('downloadBtn').addEventListener('click', () => {
    const idCard = document.querySelector('.id-card');
    html2canvas(idCard).then((canvas) => {
        const imgData = canvas.toDataURL('image/png');
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF('l', 'mm', [500, 300]);
        pdf.addImage(imgData, 'PNG', 0, 0, 500, 300);
        pdf.save('id-card.pdf');
    });
});
