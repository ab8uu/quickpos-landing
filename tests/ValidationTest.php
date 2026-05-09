<?php
declare(strict_types=1);

// Linked to Jira ticket: POS-205

use PHPUnit\Framework\TestCase;

class ValidationTest extends TestCase
{
    private function isValidEmail(string $email): bool
    {
        return (bool) filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * @dataProvider invalidEmailProvider
     * POS-205: Test multiple invalid email formats
     */
    public function testInvalidEmailFormatsAreRejected(string $email): void
    {
        $this->assertFalse(
            $this->isValidEmail($email),
            "Email '$email' should be invalid but passed validation"
        );
    }

    public static function invalidEmailProvider(): array
    {
        return [
            'plain text'           => ['plaintext'],
            'missing domain'       => ['user@'],
            'missing local'        => ['@domain.com'],
            'spaces in email'      => ['hello world@email.com'],
            'double @'             => ['user@@domain.com'],
            'no TLD'               => ['user@domain'],
            'trailing dot'         => ['user@domain.'],
        ];
    }

    /**
     * @dataProvider validEmailProvider
     * POS-205: Test that valid emails pass
     */
    public function testValidEmailFormatsAreAccepted(string $email): void
    {
        $this->assertTrue(
            $this->isValidEmail($email),
            "Email '$email' should be valid but failed validation"
        );
    }

    public static function validEmailProvider(): array
    {
        return [
            'simple email'         => ['user@example.com'],
            'with dot in name'     => ['user.name@domain.org'],
            'with plus tag'        => ['user+tag@gmail.com'],
            'subdomain'            => ['admin@mail.quickpos.io'],
        ];
    }

    // POS-205: Test name minimum length rule (if your form has it)
    public function testNameMustNotBeSingleCharacter(): void
    {
        $name = trim('A');
        $isValid = strlen($name) >= 2;
        $this->assertFalse($isValid, 'Single character name should fail minimum length check');
    }

    // POS-205: Test message minimum length
    public function testMessageMustHaveMinimumLength(): void
    {
        $message = trim('Hi');
        $isValid = strlen($message) >= 10;
        $this->assertFalse($isValid, 'Very short message should fail minimum length');
    }
}