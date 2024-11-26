<?php

declare(strict_types=1);

namespace App\Enums;

enum StateEnum: string
{
    case AC = 'AC';
    case AL = 'AL';
    case AP = 'AP';
    case AM = 'AM';
    case BA = 'BA';
    case CE = 'CE';
    case DF = 'DF';
    case ES = 'ES';
    case GO = 'GO';
    case MA = 'MA';
    case MT = 'MT';
    case MS = 'MS';
    case MG = 'MG';
    case PA = 'PA';
    case PB = 'PB';
    case PR = 'PR';
    case PE = 'PE';
    case PI = 'PI';
    case RJ = 'RJ';
    case RN = 'RN';
    case RS = 'RS';
    case RO = 'RO';
    case RR = 'RR';
    case SC = 'SC';
    case SP = 'SP';
    case SE = 'SE';
    case TO = 'TO';

    public function text(): string
    {
        return match ($this) {
            self::AC => trans('states.ac'),
            self::AL => trans('states.al'),
            self::AP => trans('states.ap'),
            self::AM => trans('states.am'),
            self::BA => trans('states.ba'),
            self::CE => trans('states.ce'),
            self::DF => trans('states.df'),
            self::ES => trans('states.es'),
            self::GO => trans('states.go'),
            self::MA => trans('states.ma'),
            self::MT => trans('states.mt'),
            self::MS => trans('states.ms'),
            self::MG => trans('states.mg'),
            self::PA => trans('states.pa'),
            self::PB => trans('states.pb'),
            self::PR => trans('states.pr'),
            self::PE => trans('states.pe'),
            self::PI => trans('states.pi'),
            self::RJ => trans('states.rj'),
            self::RN => trans('states.rn'),
            self::RS => trans('states.rs'),
            self::RO => trans('states.ro'),
            self::RR => trans('states.rr'),
            self::SC => trans('states.sc'),
            self::SP => trans('states.sp'),
            self::SE => trans('states.se'),
            self::TO => trans('states.to'),
        };
    }
}
