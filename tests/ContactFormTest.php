<?php
declare(strict_types=1);

// Linked to Jira tickets: POS-201, POS-202, POS-203

use PHPUnit\Framework\TestCase;

class ContactFormTest extends TestCase
{
    /**
     * Replicates the validation logic in contact.php
     * Tests call this instead of making HTTP requests
     */
    private function validateContactForm(array $data): array
    {
        $errors = [];

        if (empty(trim($data['name'] ?? ''))) {
            $errors[] = 'Name is required.';
        }

        if (empty(trim($data['email'] ?? ''))) {
            $errors[] = 'Email is required.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email format.';
        }

        if (empty(trim($data['message'] ?? ''))) {
            $errors[] = 'Message is required.';
        }

        return $errors;
    }

    // POS-201: All fields empty should return 3 errors
    public function testAllEmptyFieldsReturnErrors(): void
    {
        $errors = $this->validateContactForm([
            'name'    => '',
            'email'   => '',
            'message' => '',
        ]);

        $this->assertCount(3, $errors, 'Expected exactly 3 errors for all empty fields');
        $this->assertContains('Name is required.', $errors);
        $this->assertContains('Email is required.', $errors);
        $this->assertContains('Message is required.', $errors);
    }

    // POS-201: Only name empty
    public function testEmptyNameReturnsError(): void
    {
        $errors = $this->validateContactForm([
            'name'    => '',
            'email'   => 'user@example.com',
            'message' => 'Hello there',
        ]);

        $this->assertContains('Name is required.', $errors);
        $this->assertNotContains('Email is required.', $errors);
        $this->assertNotContains('Message is required.', $errors);
    }

    // POS-201: Only message empty
    public function testEmptyMessageReturnsError(): void
    {
        $errors = $this->validateContactForm([
            'name'    => 'Ali Hassan',
            'email'   => 'ali@example.com',
            'message' => '',
        ]);

        $this->assertContains('Message is required.', $errors);
    }

    // POS-202: Invalid email format
    public function testInvalidEmailReturnsError(): void
    {
        $errors = $this->validateContactForm([
            'name'    => 'Ahmed Khan',
            'email'   => 'not-an-email',
            'message' => 'Test message here',
        ]);

        $this->assertContains('Invalid email format.', $errors);
        $this->assertNotContains('Email is required.', $errors);
    }

    // POS-202: Email with missing domain
    public function testEmailMissingDomainReturnsError(): void
    {
        $errors = $this->validateContactForm([
            'name'    => 'Sara Ahmed',
            'email'   => 'sara@',
            'message' => 'Need a demo',
        ]);

        $this->assertContains('Invalid email format.', $errors);
    }

    // POS-203: Valid data returns NO errors (success case)
    public function testValidDataReturnsNoErrors(): void
    {
        $errors = $this->validateContactForm([
            'name'    => 'Jane Smith',
            'email'   => 'jane.smith@company.com',
            'message' => 'I would like to schedule a product demo for our team.',
        ]);

        $this->assertEmpty($errors, 'Valid form data must produce zero validation errors');
    }

    // POS-203: Whitespace-only fields should be treated as empty
    public function testWhitespaceOnlyFieldsReturnErrors(): void
    {
        $errors = $this->validateContactForm([
            'name'    => '   ',
            'email'   => '   ',
            'message' => '   ',
        ]);

        $this->assertNotEmpty($errors, 'Whitespace-only fields must fail validation');
    }
}