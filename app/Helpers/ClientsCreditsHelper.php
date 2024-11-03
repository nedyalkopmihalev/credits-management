<?php
namespace App\Helpers;

class ClientsCreditsHelper
{
    /**
     * @param float $creditAmount
     * @param int $months
     * @param float $annualInterestRate
     * @return string
     */
    public static function clientCreditMonthlyLoan(float $creditAmount, int $months, float $annualInterestRate)
    {
        $monthlyInterestRate = ($annualInterestRate / 12);
        $monthlyInterestRate = $monthlyInterestRate / 100;
        $monthlyInterestRate = sprintf('%0.2f', $monthlyInterestRate);

        $monthlyInterestRateAmount = $creditAmount * $monthlyInterestRate;
        $monthlyInterestRateAmount = sprintf('%0.2f', $monthlyInterestRateAmount);

        $monthlyInterestAmount = ($creditAmount / $months) + $monthlyInterestRateAmount;

        return sprintf('%0.2f', $monthlyInterestAmount);
    }
}