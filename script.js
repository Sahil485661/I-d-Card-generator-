document.getElementById('generateBtn').addEventListener('click', () => {
 
    document.getElementById('previewOrgName').innerText = document.getElementById('orgName').value;
    document.getElementById('previewName').innerText = document.getElementById('studentName').value;
    document.getElementById('previewstudentCourse').innerText = document.getElementById('studentCourse').value;
    document.getElementById('previewSession').innerText = document.getElementById('Session').value;
    document.getElementById('previewfatherName').innerText = document.getElementById('fatherName').value;
    document.getElementById('previewcontact').innerText = document.getElementById('contact').value;
    document.getElementById('previewBloodGroup').innerText = document.getElementById('BloodGroup').value;
    document.getElementById('previewDateofBirth').innerText = document.getElementById('DateofBirth').value;

    const imageInput = document.getElementById('imageInput');
    if (imageInput.files[0]) {
        const reader = new FileReader();
        reader.onload = (e) => document.getElementById('previewImage').src = e.target.result;
        reader.readAsDataURL(imageInput.files[0]);
    }
});

document.getElementById('downloadBtn').addEventListener('click', () => {
    html2canvas(document.getElementById('idCardPreview')).then((canvas) => {
        const imgData = canvas.toDataURL('image/png');
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF('p', 'mm', [210, 297]); // A4
        pdf.addImage(imgData, 'PNG', 50, 20, 110, 150);
        pdf.save('id-card.pdf');
    });
});
