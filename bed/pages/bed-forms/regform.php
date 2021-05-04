<?php
require('../bed-fpdf/fpdf.php');




class PDF extends FPDF
{
}

$pdf = new PDF('L', 'mm', array(165, 139));

$pdf->SetLeftMargin(13);
$pdf->SetRightMargin(10);
$pdf->SetAutoPageBreak(true, 8);
$pdf->AddPage();


$pdf->Image('../../../assets/img/logo.png', 33, 9, 10, 10);

$pdf->SetTextColor(255, 0, 0);

$pdf->SetFont('Arial', 'B', 11);

$pdf->Cell(151, 5, 'SAINT FRANCIS OF ASSISI COLLEGE', 0, 1, 'C');

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 11, 'C');

$test = utf8_decode("");
$pdf->Cell(151, 5, '96 Bayanan ' . $test . ', City of Bacoor, Cavite', 0, 1, 'C');

$pdf->Ln(1);
$pdf->SetFont('Arial', '', 11);

$pdf->Ln(2);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(140, 4, 'STUDENTS COPY', 0, 1, 'R');
$pdf->Cell(140, 5, 'CERTIFICATE OF REGISTRATION AND STUDENTS INFORAMTION', 1, 0, 'C');
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Ln(2);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(25, 4, 'Academic Year: ', 0, 0);
$pdf->Cell(40, 4, '', 'B', 0, 'C');
$pdf->Cell(28, 4, 'STUDENT TYPE: ', 0, 0);
$pdf->Cell(40, 4, '', 'B', 0, 'C');
$pdf->Cell(10, 5, '', 0, 1);
$pdf->Cell(25, 4, 'GRADE LEVEL: ', 0, 0);
$pdf->Cell(30, 4, '', 'B', 0, 'C');
$pdf->Cell(17, 4, 'SECTION: ', 0, 0);
$pdf->Cell(23, 4, '', 'B', 1, 'C');
$pdf->Cell(18, 4, 'STRAND: ', 0, 0);
$pdf->Cell(23, 4, '', 'B', 0, 'C');
$pdf->Cell(10, 5, '', 0, 1);

$pdf->Ln(1);
$pdf->Cell(13, 1, 'Name:', 0, 0);
$pdf->Cell(0, 1, '', 'B', 1, 'C');

$pdf->Ln(1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(13, 3, '', 0, 0);
$pdf->Cell(35, 3, '(Family Name)', 0, 0, 'C');
$pdf->Cell(35, 3, '(First Name)', 0, 0, 'C');
$pdf->Cell(35, 3, '(Middle Name)', 0, 0, 'C');

$pdf->Ln(4);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(40, 4, 'COURSE NUMBER', 'T,L', 0, 'C');
$pdf->Cell(15, 7, 'Units', 'T,L,B', 0, 'C');
$pdf->Cell(15, 7, 'Days', 'T,L,B', 0, 'C');
$pdf->Cell(15, 7, 'Time', 'T,L,B', 0, 'C');
$pdf->Cell(10, 7, 'Room', 'T,L,R,B', 0, 'C');
$pdf->Cell(17, 4, 'Final', 'T', 0, 'C');
$pdf->Cell(0, 7, 'Professor', 1, 0, 'C');
$pdf->Cell(0, 4, '', 0, 1);

$pdf->Cell(40, 3, '(SUBJECTS)', 'L,B', 0, 'C');
$pdf->Cell(55, 3, '', 0, 0);
$pdf->Cell(17, 3, 'Rating', 'B', 0, 'C');


$pdf->Rect(13, 55, 40, 35);
$pdf->Rect(68, 55, 15, 35);
$pdf->Rect(98, 55, 10, 35);
$pdf->Rect(125, 55, 30, 35);

$pdf->SetXY(13, 90);
$pdf->Cell(0, 0, '', 1, 1);

$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 8);

$pdf->Cell(142, 3, 'FINANCIAL DETAILS', 1, 1, 'C');

$pdf->Cell(20, 4, 'DATE', 1, 0, 'C');
$pdf->Cell(55, 4, 'PARTICULARS', 1, 0, 'C');
$pdf->Cell(30, 4, 'CREDIT', 1, 0, 'C');
$pdf->Cell(37, 4, 'BALANCE', 1, 1, 'C');

$pdf->Cell(20, 4, '', 1, 0, 'C');
$pdf->Cell(55, 4, '', 1, 0, 'C');
$pdf->Cell(30, 4, '', 1, 0, 'C');
$pdf->Cell(37, 4, '', 1, 1, 'C');

$pdf->Cell(20, 4, '', 1, 0, 'C');
$pdf->Cell(55, 4, '', 1, 0, 'C');
$pdf->Cell(30, 4, '', 1, 0, 'C');
$pdf->Cell(37, 4, '', 1, 1, 'C');

$pdf->Cell(20, 4, '', 1, 0, 'C');
$pdf->Cell(55, 4, '', 1, 0, 'C');
$pdf->Cell(30, 4, '', 1, 0, 'C');
$pdf->Cell(37, 4, '', 1, 1, 'C');

$pdf->Cell(20, 4, '', 1, 0, 'C');
$pdf->Cell(55, 4, '', 1, 0, 'C');
$pdf->Cell(30, 4, '', 1, 0, 'C');
$pdf->Cell(37, 4, '', 1, 1, 'C');

$pdf->Cell(20, 4, '', 1, 0, 'C');
$pdf->Cell(55, 4, '', 1, 0, 'C');
$pdf->Cell(30, 4, '', 1, 0, 'C');
$pdf->Cell(37, 4, '', 1, 1, 'C');

$pdf->Ln(2);
$pdf->SetFont('Arial', 'B', 7.5);
$pdf->Cell(85, 2, '', 0, 0);
$pdf->Cell(25, 2, 'Verified / Approved by:', 0, 0, 'C');

$pdf->Ln(4);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(40, 2, '', 'B', 0, 'C');
$pdf->Cell(40, 2, '', 0, 0);
$pdf->Cell(55, 2, '', 'B', 1, 'C');
$pdf->Cell(25, 4, 'Name & Signature', 0, 0, 'C');
$pdf->Cell(45, 2, '', 0, 0);
$pdf->Cell(80, 4, 'Principal', 0, 0, 'C');


$pdf->SetFont('Arial', 'B', 4.5);
$pdf->SetTopMargin(13);
$pdf->SetLeftMargin(13);
$pdf->AddPage();
$pdf->Cell(0, 2.3, 'RULES CONCERNING FEES:', 0, 1, 'L');
$pdf->Cell(0, 2.3, '', 0, 1, 'L');
$pdf->Cell(0, 2.3, 'PAYMENT OF FEES:', 0, 1, 'L');
$pdf->SetFont('Arial', '', 4.5);
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'All fees are computed on the semestral or school term basis and are payable in upon registration. The total fees may be paid by installment under the terms', 0, 1, 'L');
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'but is should not be interpreted, however, that the fees are payable on the month-to-month basis:', 0, 1, 'L');
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, '1. Down payment 40% of the total fees to be paid upon registration.', 0, 1, 'L');
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, '2. Second installment 70% of the total fees to be paid on or beore the first periodic examination', 0, 1, 'L');
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, '3. Third installment 100% of the total fees to be paid on or before the mid semestral examination.', 0, 1, 'L');
$pdf->Cell(0, 2.3, '', 0, 1, 'L');
$pdf->SetFont('Arial', 'B', 4.5);
$pdf->Cell(0, 2.3, 'DISCOUNT PRIVILEGE:', 0, 1, 'L');

$pdf->SetFont('Arial', '', 4.5);
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'Discount on tuition fee only, may be given under the following conditions.', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, '1. 5% discount is given if the total fees is paid in full upon registration,', 0, 1, 'L');
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, '2. 5%, 10%, 15%, 20%, and 25% is given to second, third, fourth, fifth, and six brothers/sisters respectively', 0, 1, 'L');
$pdf->Cell(0, 2.3, '', 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 4.5);
$pdf->Cell(0, 2.3, 'ADJUSTMENT OF FEES DUE TO WITHDRAWAL OF ENROLLMENT:', 0, 1, 'L');

$pdf->SetFont('Arial', '', 4.5);
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'Section VI, paragrap 137 & 139 of Manual of Regulations of Private Schools, Seventh Edition, 1970 of the Bureau of Private Schools, which is quoted below govern the refund or', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'adjustment of fees:', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, '"137, When a student registers in a school, it is understood that he is enrolling for the entire school year for elementary and secondary courses, and for the entire semester for the collegiate', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'courses. A student who transfers on otherwise withdraws, In writing, within two weeks after the beginning of classes and who has already paid the pertinent tuition and other school fees', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'in full on any length longer than one month may be charged ten percent (10%) of the total amount due for the term if the withdraws within the first week of classes, or twenty percent (20%)', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'if within the second week of classes, regardless of whether or not he has actually attended classes. The student may be charged all the school fees in full if the withdraw anytime after the', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'second week of classes. However, if the transfer on withdrawal is due to a justifiable reason, the student shall be charged the pertinent fees up to an including the last month of', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, '"139. Full refund of fees shall be made for any course or level which has been discontinued by the school or not', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'credited by the office thru no fault of the student."', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'The fees paid for registration and identification card are not refundable.', 0, 1, 'L');
$pdf->Cell(0, 2.3, '', 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 4.5);
$pdf->Cell(0, 2.3, 'NON-PAYMENT OF ACCOUNT:', 0, 1, 'L');

$pdf->SetFont('Arial', '', 4.5);
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'The administration reserves the right to suspend or drop from the rolls any student who has not paid in full his/her financial obligations on or before the scheduled dated of the third', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'periodic examination. It is also reserves the right to withhold from a student the issuance of report card (form 138), honorable dismissal, certification, or other on other records, unless the', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'student has fully settled his/her financial obligation or property with the collage.', 0, 1, 'L');

$pdf->Cell(0, 2.3, '', 0, 1, 'L');


$pdf->SetFont('Arial', 'B', 4.5);
$pdf->Cell(0, 2.3, 'CHANGE OF SUBJECT, LOAD, SECTION OR COURSE:', 0, 1, 'L');

$pdf->SetFont('Arial', '', 4.5);
$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'Any student who have desires to change his subkect load section, or course must secure an application from the Registrar\'s Office accomplish it and have it approved by the Registrar\'s Office', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'within seven days after the first day of classes in order to entitle him to the corresponding adjustment fees.', 0, 1, 'L');


$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'If the dropping of any subjects is made after the said period, even if it is approved by the Registrar, the student is no longer entitled to the corresponding reduction fees.', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'If the change in the subject load or section is recommended by the Registrar or proper authorities, corresponding adjustment of fees will be made regardless of the date when affected.', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'Except when the change of subject load, section, or course is recommended by the Registrar or proper authorities application thereof shall no longer be entertained after seven (7) days from', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'start of classes', 0, 1, 'L');

$pdf->Cell(7, 2.3, '', 0, 0);
$pdf->Cell(0, 2.3, 'During the summer term, application for change of subkect load shall no longer be entertained after three (3) days from the start of the classes.', 0, 1, 'L');

$pdf->Cell(0, 2.3, '', 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 5);
$pdf->Cell(0, 2.3, 'PLEASE RECORD YOUR PAYMENTS BELOW FOR REFERENCES', 0, 1, 'L');

$pdf->SetFont('Arial', '', 5);
$pdf->Cell(29, 3, 'Date', 1, 0, 'C');
$pdf->Cell(24, 3, 'O.R. No.', 1, 0, 'C');
$pdf->Cell(22, 3, 'Amount Paid', 1, 0, 'C');
$pdf->Cell(24, 3, 'Date', 1, 0, 'C');
$pdf->Cell(21, 3, 'O.R. No.', 1, 0, 'C');
$pdf->Cell(23, 3, 'Amount Paid', 1, 1, 'C');

$pdf->Cell(29, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(22, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(21, 3, '', 1, 0, 'C');
$pdf->Cell(23, 3, '', 1, 1, 'C');
$pdf->Cell(29, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(22, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(21, 3, '', 1, 0, 'C');
$pdf->Cell(23, 3, '', 1, 1, 'C');
$pdf->Cell(29, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(22, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(21, 3, '', 1, 0, 'C');
$pdf->Cell(23, 3, '', 1, 1, 'C');
$pdf->Cell(29, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(22, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(21, 3, '', 1, 0, 'C');
$pdf->Cell(23, 3, '', 1, 1, 'C');
$pdf->Cell(29, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(22, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(21, 3, '', 1, 0, 'C');
$pdf->Cell(23, 3, '', 1, 1, 'C');
$pdf->Cell(29, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(22, 3, '', 1, 0, 'C');
$pdf->Cell(24, 3, '', 1, 0, 'C');
$pdf->Cell(21, 3, '', 1, 0, 'C');
$pdf->Cell(23, 3, '', 1, 1, 'C');


$pdf->Output();