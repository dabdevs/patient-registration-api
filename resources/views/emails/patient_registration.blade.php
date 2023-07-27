<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif;">

    <h1>Dear {{ $name }},</h1>
    
    <p>Thank you for registering as a patient with our medical facility. We are delighted to have you as a part of our community.</p>
    
    <p>Your registration details:</p>
    <ul>
        <li><strong>Name:</strong> {{ $name }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Phone Number:</strong> {{ $phone_number }}</li>
    </ul>
    
    <p>If you have any questions or need further assistance, please feel free to contact us. We are here to help!</p>
    
    <p>Thank you once again for choosing our services. We look forward to providing you with the best care possible.</p>
    
    <p>Best regards,</p>
    <p>Your Medical Facility Team</p>
</body>
</html>
