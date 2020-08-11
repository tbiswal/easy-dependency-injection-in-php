<?php

class BankAccount
{
    public function addYearlyInterest($balance, $interest)
    {
        switch ($this->accountType) {
            case 'checking':
                $rate = $this->getCheckingInterestRate();
                break;
            case 'savings':
                $rate = $this->getSavingsInterestRate();
                break;
                // other types of accounts here
        }

        return $balance + ($balance * $rate);
    }

    public function getCheckingInterestRate() {
        return .01;
    }

    public function getSavingsInterestRate() {
        return .03;
    }
}
