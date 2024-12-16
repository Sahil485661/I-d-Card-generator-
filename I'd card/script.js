document.getElementById('generateBtn').addEventListener('click', function () {
    
    const orgName = document.getElementById('orgName').value;
    const studentName = document.getElementById('studentName').value;
    const fatherName = document.getElementById('fatherName').value;
    const studentCode = document.getElementById('studentCode').value;
    const courseName = document.getElementById('courseName').value;
    const session = document.getElementById('session').value;
    const dob = document.getElementById('dob').value;
    const contact = document.getElementById('contact').value;
    const address = document.getElementById('address').value;

    
    document.getElementById('previewOrgName').innerText = orgName;
    document.getElementById('previewStudentName').innerText = studentName;
    document.getElementById('previewFatherName').innerText = fatherName;
    document.getElementById('previewStudentCode').innerText = studentCode;
    document.getElementById('previewCourseName').innerText = courseName;
    document.getElementById('previewSession').innerText = session;
    document.getElementById('previewDOB').innerText = dob;
    document.getElementById('previewContact').innerText = contact;
    document.getElementById('previewAddress').innerText = address;

    
    const imageInput = document.getElementById('imageInput');
    if (imageInput.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('previewImage').src = e.target.result;
        };
        reader.readAsDataURL(imageInput.files[0]);
    }
});

document.getElementById('downloadBtn').addEventListener('click', function () {
    const idCard = document.getElementById('idCardPreview');

    html2canvas(idCard).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jspdf.jsPDF();
        pdf.addImage(imgData, 'PNG', 15, 15, 180, 120);
        pdf.save('id-card.pdf');
    });
});
