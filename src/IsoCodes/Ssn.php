<?php

namespace IsoCodes;

/**
 * @example :
 * Instantiate the class
 * $ssn = new ssn();
 * // Generate a SSN for California
 * echo "\n" . $ssn->generate('AK');
 * echo "\n" . $ssn->generate('AL');
 * echo "\n" . $ssn->generate('AR');
 * echo "\n" . $ssn->generate('AZ');
 * echo "\n" . $ssn->generate('CA');
 * echo "\n" . $ssn->generate('CO');
 * echo '--';
 * // Validate a SSN
 * echo $ssn->validate('557-26-9048');
 *
 * @source  : http://haxorfreek.15.forumer.com/a/us-social-security-number-ssn-generator_post1847.html
 */
class Ssn
{
    // Populate this variable with the high group list provided by the Social Security Administration:
    // http://www.ssa.gov/employer/ssnvhighgroup.htm

    // We only want the numbers. Omit the explanatory text at the beginning of the file.
    // This list is from September 2007
    public $highgroup = <<<EOT
001 06 002 04	003 04	004 08	005 08	006 08
        007 06 008 90	009 90 010 90 011 90 012 90
        013 90	014 90	015 90	016 90	017 90	018 90
        019 90	020 90	021 90	022 90	023 90	024 90
        025 90	026 90	027 90*	028 88	029 88	030 88
        031 88	032 88 033 88	034 88	035 72	036 72
        037 72 038 72	039 70	040 11	041 11 042 11
        043 11	044 11	045 11	046 11	047 11	048 08
        049 08	050 96	051 96	052 96	053 96	054 96
        055 96	056 96	057 96	058 96	059 96 060 96
        061 96 062 96 063 96 064 96 065 96	066 96
        067 96	068 96	069 96	070 96	071 96	072 96
        073 96	074 96	075 96	076 96	077 96	078 96
        079 96	080 96	081 96	082 96	083 96	084 96
        085 96	086 96	087 96	088 96	089 96	090 96
        091 96	092 96	093 96	094 96	095 96	096 96
        097 96	098 96	099 96	100 96	101 96	102 96
        103 96	104 96	105 96	106 96	107 96	108 96
        109 96	110 96*	111 96*	112 96*	113 96* 114 94
        115 94 116 94 117 94 118 94 119 94	120 94
        121 94	122 94	123 94	124 94 125 94 126 94
        127 94 128 94	129 94	130 94	131 94	132 94
        133 94	134 94	135 19	136 19	137 19	138 19
        139 19	140 19	141 19	142 19* 143 19*	144 17
        145 17	146 17	147 17	148 17	149 17	150 17
        151 17	152 17	153 17	154 17 155 17	156 17
        157 17	158 17	159 84	160 84	161 84	162 84
        163 84	164 84	165 84	166 84	167 84	168 84
        169 84	170 84	171 84	172 84	173 84	174 84
        175 84	176 84	177 84	178 84*	179 84*	180 82
        181 82	182 82	183 82	184 82	185 82	186 82
        187 82	188 82	189 82	190 82	191 82	192 82
        193 82	194 82	195 82 196 82	197 82	198 82
        199 82 200 82	201 82	202 82	203 82	204 82
        205 82	206 82	207 82	208 82	209 82	210 82
        211 82	212 79	213 79	214 79	215 79	216 79
        217 79*	218 77	219 77	220 77	221 06	222 04
        223 99	224 99 225 99 226 99 227 99	228 99
        229 99	230 99	231 99	232 53	233 53	234 53
        235 53	236 53	237 99	238 99	239 99	240 99
        241 99	242 99	243 99 244 99 245 99	246 99
        247 99	248 99	249 99	250 99	251 99	252 99
        253 99	254 99	255 99	256 99	257 99	258 99
        259 99	260 99	261 99	262 99	263 99	264 99
        265 99	266 99	267 99	268 13	269 13	270 13
        271 13 272 13 273 13	274 13	275 13	276 13
        277 13	278 13	279 13	280 13	281 13	282 13
        283 13	284 13*	285 13*	286 11 287 11	288 11
        289 11 290 11	291 11	292 11	293 11	294 11
        295 11	296 11	297 11	298 11	299 11	300 11
        301 11	302 11	303 33*	304 31	305 31	306 31
        307 31	308 31	309 31	310 31 311 31	312 31
        313 31	314 31 315 31	316 31	317 31	318 06
        319 06	320 06	321 06	322 06	323 06	324 06
        325 06	326 06	327 06	328 06	329 06	330 06
        331 06 332 06	333 06	334 06 335 06 336 06
        337 06	338 06	339 06	340 06	341 06	342 06
        343 06	344 06	345 06	346 06	347 06*	348 06*
        349 04	350 04	351 04 352 04 353 04	354 04
        355 04	356 04	357 04	358 04	359 04	360 04
        361 04	362 35	363 35*	364 35*	365 33	366 33
        367 33	368 33	369 33	370 33	371 33	372 33
        373 33	374 33	375 33	376 33	377 33 378 33
        379 33	380 33	381 33	382 33	383 33	384 33
        385 33	386 33 387 29	388 29	389 29	390 29
        391 29	392 29	393 27 394 27	395 27	396 27
        397 27	398 27	399 27	400 67	401 67 402 67
        403 67	404 67	405 67	406 67*	407 65	408 99
        409 99	410 99	411 99 412 99	413 99	414 99
        415 99	416 61	417 61	418 61	419 61 420 61
        421 61	422 61	423 61	424 61	425 99	426 99
        427 99	428 99	429 99	430 99	431 99	432 99
        433 99	434 99	435 99	436 99	437 99	438 99
        439 99 440 23	441 23 442 23	443 23	444 23
        445 23	446 23*	447 21	448 21	449 99	450 99
        451 99	452 99	453 99	454 99	455 99	456 99
        457 99	458 99	459 99	460 99	461 99	462 99
        463 99	464 99	465 99	466 99	467 99	468 51
        469 51*	470 49	471 49	472 49	473 49	474 49
        475 49	476 49	477 49	478 37	479 37	480 37
        481 37 482 37	483 37	484 37	485 35	486 25
        487 25	488 25 489 25	490 25	491 25	492 25
        493 25	494 25	495 25*	496 23	497 23	498 23
        499 23 500 23	501 33	502 33*	503 41 504 39
        505 53	506 51	507 51 508 51	509 27	510 27
        511 27	512 27	513 27 514 27	515 27*	516 45
        517 43 518 77	519 77 520 53 521 99	522 99
        523 99	524 99	525 99	526 99	527 99	528 99
        529 99	530 99	531 63*	532 61	533 61	534 61
        535 61 536 61	537 61	538 61 539 61*	540 73
        541 73	542 73	543 73	544 73	545 99	546 99
        547 99	548 99	549 99	550 99	551 99	552 99
        553 99	554 99	555 99	556 99	557 99	558 99
        559 99	560 99	561 99	562 99	563 99	564 99
        565 99	566 99	567 99	568 99	569 99	570 99
        571 99	572 99	573 99	574 49	575 99	576 99
        577 45	578 45* 579 43	580 37	581 99	582 99
        583 99	584 99	585 99	586 61	587 99 588 03
        589 99 590 99	591 99	592 99	593 99 594 99
        595 99 596 84	597 84	598 84*	599 82	600 99
        601 99 602 65	603 65	604 65	605 65	606 65
        607 65* 608 65*	609 65*	610 65*	611 65*	612 65*
        613 65* 614 65*	615 63	616 63	617 63	618 63
        619 63 620 63	621 63	622 63	623 63	624 63
        625 63 626 63	627 11	628 11	629 11	630 11
        631 11* 632 11*	633 11*	634 11*	635 11* 636 11*
        637 08 638 08	639 08	640 08 641 08	642 08
        643 08 644 08	645 08	646 96 647 94	648 44
        649 44 650 46 651 46*	652 44 653 44	654 26
        655 26 656 26	657 26	658 24	659 16 660 16*
        661 14 662 14 663 14 664 14	665 14	667 34
        668 34 669 34 670 34	671 34	672 34*	673 34*
        674 32 675 32 676 14	677 14* 678 12 679 12
        680 90* 681 14*	682 12 683 12 684 12	685 12
        686 12 687 12	688 12	689 12	690 12	691 07
        692 07 693 07 694 07	695 07 696 07 697 07
        698 07 699 07* 700 18	701 18 702 18 703 18
        704 18 705 18 706 18	707 18 708 18 709 18
        710 18 711 18	712 18	713 18 714 18 715 18
        716 18 717 18	718 18	719 18 720 18 721 18
        722 18 723 18	724 28	725 18 726 18 727 10
        728 14 729 10	730 10	731 10 732 09	733 09
        750 09 751 07	752 01 753 01 756 05 757 05
        758 05 759 05 760 05* 761 03 762 03 763 03
        764 80 765 80*	766 64* 767 64*	768 62 769 62
        770 62 771 62 772 62*
EOT;

    // This information is obtained from:
    // http://www.ssa.gov/employer/stateweb.htm
    public $statePrefixes = array(
        'AK' => array(574),
        'AL' => array(416, 417, 418, 419, 420, 421, 422, 423, 424),
        'AR' => array(429, 430, 431, 432, 676, 677, 678, 679),
        'AZ' => array(526, 527, 600, 601, 764, 765),
        'CA' => array(545, 546, 547, 548, 549, 550, 551, 552, 553, 554, 555, 556, 557, 558, 559, 560, 561, 562, 563, 564, 565, 566, 567, 568, 569, 570, 571, 572, 573, 602, 603, 604, 605, 606, 607, 608, 609, 610, 611, 612, 613, 614, 615, 616, 617, 618, 619, 620, 621, 622, 623, 624, 625, 626),
        'CO' => array(521, 522, 523, 524, 650, 651, 652, 653),
        'CT' => array(40, 41, 42, 43, 44, 45, 46, 47, 48, 49),
        'DC' => array(577, 578, 579),
        'DE' => array(221, 222),
        'FL' => array(261, 262, 263, 264, 265, 266, 267, 589, 590, 591, 592, 593, 594, 595, 766, 767, 768, 769, 770, 771, 772),
        'GA' => array(252, 253, 254, 255, 256, 257, 258, 259, 260, 667, 668, 669, 670, 671, 672, 673, 674, 675),
        'HI' => array(575, 576, 750, 751),
        'IA' => array(478, 479, 480, 481, 482, 483, 484, 485),
        'ID' => array(518, 519),
        'IL' => array(318, 319, 320, 321, 322, 323, 324, 325, 326, 327, 328, 329, 330, 331, 332, 333, 334, 335, 336, 337, 338, 339, 340, 341, 342, 343, 344, 345, 346, 347, 348, 349, 350, 351, 352, 353, 354, 355, 356, 357, 358, 359, 360, 361),
        'IN' => array(303, 304, 305, 306, 307, 308, 309, 310, 311, 312, 313, 314, 315, 316, 317),
        'KS' => array(509, 510, 511, 512, 513, 514, 515),
        'KY' => array(400, 401, 402, 403, 404, 405, 406, 407),
        'LA' => array(433, 434, 435, 436, 437, 438, 439, 659, 660, 661, 662, 663, 664, 665),
        'MA' => array(10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34),
        'MD' => array(212, 213, 214, 215, 216, 217, 218, 219, 220),
        'ME' => array(4, 5, 6, 7),
        'MI' => array(362, 363, 364, 365, 366, 367, 368, 369, 370, 371, 372, 373, 374, 375, 376, 377, 378, 379, 380, 381, 382, 383, 384, 385, 386),
        'MN' => array(468, 469, 470, 471, 472, 473, 474, 475, 476, 477),
        'MO' => array(486, 487, 488, 489, 490, 491, 492, 493, 494, 495, 496, 497, 498, 499, 500),
        'MS' => array(425, 426, 427, 428, 587),
        'MT' => array(516, 517),
        'NC' => array(237, 238, 239, 240, 241, 242, 243, 244, 245, 246, 681, 682, 683, 684, 685, 686, 687, 688, 689, 690),
        'ND' => array(501, 502),
        'NE' => array(505, 506, 507, 508),
        'NH' => array(1, 2, 3),
        'NJ' => array(135, 136, 137, 138, 139, 140, 141, 142, 143, 144, 145, 146, 147, 148, 149, 150, 151, 152, 153, 154, 155, 156, 157, 158),
        'NM' => array(525, 585, 648, 649),
        'NV' => array(530, 680),
        'NY' => array(50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134),
        'OH' => array(268, 269, 270, 271, 272, 273, 274, 275, 276, 277, 278, 279, 280, 281, 282, 283, 284, 285, 286, 287, 288, 289, 290, 291, 292, 293, 294, 295, 296, 297, 298, 299, 300, 301, 302),
        'OK' => array(440, 441, 442, 443, 444, 445, 446, 447, 448),
        'OR' => array(540, 541, 542, 543, 544),
        'PA' => array(159, 160, 161, 162, 163, 164, 165, 166, 167, 168, 169, 170, 171, 172, 173, 174, 175, 176, 177, 178, 179, 180, 181, 182, 183, 184, 185, 186, 187, 188, 189, 190, 191, 192, 193, 194, 195, 196, 197, 198, 199, 200, 201, 202, 203, 204, 205, 206, 207, 208, 209, 210, 211),
        'RI' => array(35, 36, 37, 38, 39),
        'SC' => array(247, 248, 249, 250, 251, 654, 655, 656, 657, 658),
        'SD' => array(503, 504),
        'TN' => array(408, 409, 410, 411, 412, 413, 414, 415, 756, 757, 758, 759, 760, 761, 762, 763),
        'TX' => array(449, 450, 451, 452, 453, 454, 455, 456, 457, 458, 459, 460, 461, 462, 463, 464, 465, 466, 467, 627, 628, 629, 630, 631, 632, 633, 634, 635, 636, 637, 638, 639, 640, 641, 642, 643, 644, 645),
        'UT' => array(528, 529, 646, 647),
        'VA' => array(223, 224, 225, 226, 227, 228, 229, 230, 231, 691, 692, 693, 694, 695, 696, 697, 698, 699),
        'VT' => array(8, 9),
        'WA' => array(531, 532, 533, 534, 535, 536, 537, 538, 539),
        'WI' => array(387, 388, 389, 390, 391, 392, 393, 394, 395, 396, 397, 398, 399),
        'WV' => array(232, 233, 234, 235, 236),
        'WY' => array(520),
    );

    public $states = array('AK', 'AL', 'AR', 'AZ', 'CA', 'CO', 'CT', 'DC', 'DE', 'FL', 'GA', 'HI', 'IA', 'ID', 'IL', 'IN', 'KS', 'KY', 'LA', 'MA', 'MD', 'ME', 'MI', 'MN', 'MO', 'MS', 'MT', 'NC', 'ND', 'NE', 'NH', 'NJ', 'NM', 'NV', 'NY', 'OH', 'OK', 'OR', 'PA', 'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VA', 'VT', 'WA', 'WI', 'WV', 'WY');

    // The SSA uses a funky method of figuring out what group number to use next. This area has them in the proper order and makes it easier to generate a SSN.
    public $possibleGroups = array(1, 3, 5, 7, 9, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 44, 46, 48, 50, 52, 54, 56, 58, 60, 62, 64, 66, 68, 70, 72, 74, 76, 78, 80, 82, 84, 86, 88, 90, 92, 94, 96, 98, 2, 4, 6, 8, 11, 13, 15, 17, 19, 21, 23, 25, 27, 29, 31, 33, 35, 37, 39, 41, 43, 45, 47, 49, 51, 53, 55, 57, 59, 61, 63, 65, 67, 69, 71, 73, 75, 77, 79, 81, 83, 85, 87, 89, 91, 93, 95, 97, 99);

    /**
     * @return Ssn
     */
    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new Ssn(true);
        }

        return $instance;
    }

    /**
     * Cleans the high group number list so it is useful.
     *
     * @param bool $fromInstance DO NOT USE IT. It's a flag to determine if constructor is called from getInstance or not.
     */
    public function __construct($fromInstance = false)
    {
        if ($fromInstance !== true) {
            trigger_error('Manual instantiation of '.__CLASS__.' is deprecated since version 1.2 and will be removed in 2.0. Use the Ssn::getInstance or Ssn::validate instead.', E_USER_DEPRECATED);
        }

        $highgroup = $this->highgroup;

        // Trim the high group list and remove asterisks, fix space/tabs, and replace new lines with tabs.
        // The data isn't formatted well so we have to do quite a bit of random replacing.
        $highgroup = trim((string) $highgroup);
        $highgroup = str_replace(array('*', " \t", "\n", ' '), array('', "\t", "\t", "\t"), $highgroup);

        // Explode on tab. This should give us an array of prefixes and group numbers, IE '203 82', '204 82', etc
        $highgroup = explode("\t", $highgroup);

        // Make array useful by splitting the prefix and group number
        // We also convert the string to an int for easier handling later down the road
        $cleangroup = array();
        foreach ($highgroup as $value) {
            if (trim($value) != '') {
                $temp = explode(' ', $value);
                if (isset($temp[1])) {
                    $cleangroup[(int) trim($temp[0])] = (int) trim($temp[1]);
                    $this->highgroup                  = (string) $cleangroup;
                }
            }
        }
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    /**
     * Generate an SSN based on state.
     *
     * @param mixed  $state
     * @param string $separator
     *
     * @return false|string (false: bad state found)
     */
    public function generate($state = false, $separator = '-')
    {
        $states         = $this->states;
        $statePrefixes  = $this->statePrefixes;
        $highgroup      = $this->highgroup;
        $possibleGroups = $this->possibleGroups;

        if ($state === false) {
            $state = $states[mt_rand(0, count($states) - 1)];
        }

        $state = strtoupper($state);

        // Sanity check: is this a valid state?
        if (!isset($statePrefixes[$state])) {
            return false;
        }

        // Generate area number
        $area = $statePrefixes[$state][array_rand($statePrefixes[$state])];

        // Generate group number
        $group = $possibleGroups[mt_rand(0, array_search($highgroup[$area], $possibleGroups))]; // Generate valid group number

        // Generate last four
        $lastfour = sprintf('%04s', trim(mt_rand(0, 9999)));

        return sprintf('%03s', $area).$separator.sprintf('%02s', $group).$separator.$lastfour;
    }

    /**
     * Validate a SSN.
     *
     * @param mixed $ssn
     *
     * @return bool : false, or two letter state abbreviation if it is valid
     */
    public static function validate($ssn)
    {
        if (!is_string($ssn)) {
            return false;
        }
        if (trim($ssn) === '') {
            return false;
        }

        $validator = self::getInstance();
        $statePrefixes = $validator->statePrefixes;
        $highgroup      = $validator->highgroup;
        $possibleGroups = $validator->possibleGroups;

        // Split up the SSN
        // If not 9 or 11 long, then return false
        $length = strlen($ssn);
        if ($length == 9) {
            $areaNumber  = substr($ssn, 0, 3);
            $groupNumber = substr($ssn, 3, 2);
            $lastFour    = substr($ssn, 5);
        } elseif ($length == 11) {
            $areaNumber  = substr($ssn, 0, 3);
            $groupNumber = substr($ssn, 4, 2);
            $lastFour    = substr($ssn, 7);
        } else {
            return false;
        }

        // Strip leading zeros
        $areaNumber  = ltrim($areaNumber, 0);
        $groupNumber = ltrim($groupNumber, 0);

        // Check if parts are numeric
        if (!is_numeric($areaNumber) || !is_numeric($groupNumber) || !is_numeric($lastFour)) {
            return false;
        }

        foreach ($statePrefixes as $numbers) {
            // Search for the area number in the state list
            if (in_array($areaNumber, $numbers)) {
                // Make sure the group number is valid
                if (array_search($highgroup[$areaNumber], $possibleGroups) >= array_search($groupNumber, $possibleGroups)) {
                    //return $state => must use "as $state => numbers" in the foreach loop;
                    return true;
                } else {
                    return false;
                }
            }
        }

        return false;
    }
}
