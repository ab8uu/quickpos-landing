<?php
declare(strict_types=1);

// Linked to Jira ticket: POS-204

use PHPUnit\Framework\TestCase;

class PageLoadTest extends TestCase
{
    private string $root;

    protected function setUp(): void
    {
        // __DIR__ is /tests, so go up one level to project root
        $this->root = dirname(__DIR__);
    }

    // POS-204: All required PHP files must exist
    public function testIndexFileExists(): void
    {
        $this->assertFileExists(
            $this->root . '/index.php',
            'index.php must exist in project root'
        );
    }

    public function testContactFileExists(): void
    {
        $this->assertFileExists(
            $this->root . '/contact.php',
            'contact.php must exist in project root'
        );
    }

    public function testThankyouFileExists(): void
    {
        $this->assertFileExists(
            $this->root . '/thankyou.php',
            'thankyou.php must exist in project root'
        );
    }

    // POS-204: PHP files must have no syntax errors
    public function testIndexPhpPassesSyntaxCheck(): void
    {
        $file = $this->root . '/index.php';
        $output = shell_exec('php -l ' . escapeshellarg($file) . ' 2>&1');
        $this->assertStringContainsString(
            'No syntax errors detected',
            (string) $output,
            'index.php must pass PHP syntax check'
        );
    }

    public function testContactPhpPassesSyntaxCheck(): void
    {
        $file = $this->root . '/contact.php';
        $output = shell_exec('php -l ' . escapeshellarg($file) . ' 2>&1');
        $this->assertStringContainsString(
            'No syntax errors detected',
            (string) $output,
            'contact.php must pass PHP syntax check'
        );
    }

    public function testThankyouPhpPassesSyntaxCheck(): void
    {
        $file = $this->root . '/thankyou.php';
        $output = shell_exec('php -l ' . escapeshellarg($file) . ' 2>&1');
        $this->assertStringContainsString(
            'No syntax errors detected',
            (string) $output,
            'thankyou.php must pass PHP syntax check'
        );
    }

    // POS-204: CSS file must exist
    public function testCssFileExists(): void
    {
        $found = file_exists($this->root . '/css/style.css')
               || file_exists($this->root . '/style.css');
        $this->assertTrue($found, 'A CSS stylesheet file must exist');
    }

    // POS-204: Tests folder itself must exist
    public function testTestsFolderExists(): void
    {
        $this->assertDirectoryExists(
            $this->root . '/tests',
            '/tests directory must exist'
        );
    }
}