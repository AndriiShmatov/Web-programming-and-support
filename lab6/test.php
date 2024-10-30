<?php
require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

try {
    // Створення об'єкта BankAccount
    $account = new BankAccount("USD", 100);
    $account->deposit(50);
    echo "Баланс після поповнення: " . $account->getBalance() . "\n";

    $account->withdraw(30);
    echo "Баланс після зняття: " . $account->getBalance() . "\n";

    // Створення об'єкта SavingsAccount
    $savings = new SavingsAccount("USD", 200);
    $savings->applyInterest();
    echo "Баланс накопичувального рахунку після застосування відсотків: " . $savings->getBalance() . "\n";

    // Тестування винятків
    $account->withdraw(200); // Недостатньо коштів
} catch (Exception $e) {
    echo "Помилка: " . $e->getMessage() . "\n";
}
?>
