<?php
namespace App\Helpers;

class ClientsCreditsHelper
{
    /**
     * @param float $creditAmount
     * @param float $annualInterestRate
     * @return string
     */
    public static function clientCreditMonthlyLoan(float $creditAmount, float $annualInterestRate)
    {
        $monthlyInterestRate = ($annualInterestRate / 12);
        $monthlyInterestRate = $monthlyInterestRate / 100;
        $monthlyInterestRate = sprintf('%0.2f', $monthlyInterestRate);

        $monthlyInterestRateAmount = $creditAmount * $monthlyInterestRate;

        return sprintf('%0.2f', $monthlyInterestRateAmount);
    }

    /**
     * @param float $creditAmount
     * @param int $months
     * @param float $monthlyInterestRateAmount
     * @return string
     */
    public static function clientCreditMonthlyAmount(float $creditAmount, int $months, float $monthlyInterestRateAmount)
    {
        $monthlyInterestAmount = ($creditAmount / $months) + $monthlyInterestRateAmount;

        return sprintf('%0.2f', $monthlyInterestAmount);
    }

    /**
     * @param float $creditAmount
     * @param int $months
     * @param float $monthlyInterestRateAmount
     * @return string
     */
    public static function clientCreditAmount(float $creditAmount, int $months, float $monthlyInterestRateAmount)
    {
        $amount = $creditAmount + ($months * $monthlyInterestRateAmount);

        return sprintf('%0.2f', $amount);
    }
}