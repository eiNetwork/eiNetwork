<?php
/**
 *
 * Copyright (C) Villanova University 2007.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License version 2,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 */

/**
 * ISO 639-2 Language Code Class
 *
 * This is a full list of the ISO 639-2 Languages with some cutting of the
 * Titles to be short and concise. This may lead to some errors in the language
 * names. I hope these errors will be fixed overtime.
 *
 * @author      Andrew S. Nagy <andrew.nagy@villanova.edu>
 */
class Language
{
    private $lang = array('aar' => 'Afar',
                          'abk' => 'Abkhazian',
                          'ace' => 'Achinese',
                          'ach' => 'Acoli',
                          'ada' => 'Adangme',
                          'ady' => 'Adyghe',
                          'afa' => 'Afro-Asiatic',
                          'afh' => 'Afrihili',
                          'afr' => 'Afrikaans',
                          'ain' => 'Ainu',
                          'aka' => 'Akan',
                          'akk' => 'Akkadian',
                          'alb' => 'Albanian',
                          'ale' => 'Aleut',
                          'alg' => 'Algonquian',
                          'alt' => 'Southern Altai',
                          'amh' => 'Amharic',
                          'ang' => 'Old English',
                          'anp' => 'Angika',
                          'apa' => 'Apache',
                          'ara' => 'Arabic',
                          'arc' => 'Aramaic',
                          'arg' => 'Aragonese',
                          'arm' => 'Armenian',
                          'arn' => 'Mapudungun',
                          'arp' => 'Arapaho',
                          'art' => 'Artificial',
                          'arw' => 'Arawak',
                          'asm' => 'Assamese',
                          'ast' => 'Asturian',
                          'ath' => 'Athapascan',
                          'aus' => 'Australian',
                          'ava' => 'Avaric',
                          'ave' => 'Avestan',
                          'awa' => 'Awadhi',
                          'aym' => 'Aymara',
                          'aze' => 'Azerbaijani',
                          'bad' => 'Banda',
                          'bai' => 'Bamileke',
                          'bak' => 'Bashkir',
                          'bal' => 'Baluchi',
                          'bam' => 'Bambara',
                          'ban' => 'Balinese',
                          'baq' => 'Basque',
                          'bas' => 'Basa',
                          'bat' => 'Baltic',
                          'bej' => 'Beja',
                          'bel' => 'Belarusian',
                          'bem' => 'Bemba',
                          'ben' => 'Bengali',
                          'ber' => 'Berber',
                          'bho' => 'Bhojpuri',
                          'bih' => 'Bihari',
                          'bik' => 'Bikol',
                          'bin' => 'Bini',
                          'bis' => 'Bislama',
                          'bla' => 'Siksika',
                          'bnt' => 'Bantu',
                          'bos' => 'Bosnian',
                          'bra' => 'Braj',
                          'bre' => 'Breton',
                          'btk' => 'Batak',
                          'bua' => 'Buriat',
                          'bug' => 'Buginese',
                          'bul' => 'Bulgarian',
                          'bur' => 'Burmese',
                          'byn' => 'Blin',
                          'cad' => 'Caddo',
                          'cai' => 'Central American Indian',
                          'car' => 'Galibi Carib',
                          'cat' => 'Catalan',
                          'cau' => 'Caucasian',
                          'ceb' => 'Cebuano|cebuano',
                          'cel' => 'Celtic',
                          'cha' => 'Chamorro',
                          'chb' => 'Chibcha',
                          'che' => 'Chechen',
                          'chg' => 'Chagatai',
                          'chi' => 'Chinese',
                          'chk' => 'Chuukese',
                          'chm' => 'Mari',
                          'chn' => 'Chinook',
                          'cho' => 'Choctaw',
                          'chp' => 'Chipewyan',
                          'chr' => 'Cherokee',
                          'chu' => 'Church Slavic',
                          'chv' => 'Chuvash',
                          'chy' => 'Cheyenne',
                          'cmc' => 'Chamic',
                          'cop' => 'Coptic',
                          'cor' => 'Cornish',
                          'cos' => 'Corsican',
                          'cpe' => 'Creole',
                          'cpf' => 'Creole',
                          'cpp' => 'Creole',
                          'cre' => 'Cree',
                          'crh' => 'Crimean Tatar',
                          'crp' => 'Creoles',
                          'csb' => 'Kashubian',
                          'cus' => 'Cushitic',
                          'cze' => 'Czech',
                          'dak' => 'Dakota',
                          'dan' => 'Danish',
                          'dar' => 'Dargwa',
                          'day' => 'Land Dayak',
                          'del' => 'Delaware',
                          'den' => 'Slave',
                          'dgr' => 'Dogrib',
                          'din' => 'Dinka',
                          'div' => 'Divehi',
                          'doi' => 'Dogri',
                          'dra' => 'Dravidian',
                          'dsb' => 'Lower Sorbian',
                          'dua' => 'Duala',
                          'dum' => 'Dutch',
                          'dut' => 'Dutch',
                          'dyu' => 'Dyula',
                          'dzo' => 'Dzongkha',
                          'efi' => 'Efik',
                          'egy' => 'Ancient Egyptian',
                          'eka' => 'Ekajuk',
                          'elx' => 'Elamite',
                          'eng' => 'English',
                          'enm' => 'Middle English',
                          'epo' => 'Esperanto',
                          'est' => 'Estonian',
                          'ewe' => 'Ewe',
                          'ewo' => 'Ewondo',
                          'fan' => 'Fang',
                          'fao' => 'Faroese',
                          'fat' => 'Fanti',
                          'fij' => 'Fijian',
                          'fil' => 'Filipino',
                          'fin' => 'Finnish',
                          'fiu' => 'Finno-Ugrian',
                          'fon' => 'Fon',
                          'fre' => 'French',
                          'frm' => 'Middle French',
                          'fro' => 'Old French',
                          'frr' => 'Northern Frisian',
                          'frs' => 'Eastern Frisian',
                          'fry' => 'Western Frisian',
                          'ful' => 'Fulah',
                          'fur' => 'Friulian',
                          'gaa' => 'Ga',
                          'gay' => 'Gayo',
                          'gba' => 'Gbaya',
                          'gem' => 'Germanic',
                          'geo' => 'Georgian',
                          'ger' => 'German',
                          'gez' => 'Geez',
                          'gil' => 'Gilbertese',
                          'gla' => 'Gaelic',
                          'gle' => 'Irish',
                          'glg' => 'Galician',
                          'glv' => 'Manx',
                          'gmh' => 'Middle High German',
                          'goh' => 'Old High German',
                          'gon' => 'Gondi',
                          'gor' => 'Gorontalo',
                          'got' => 'Gothic',
                          'grb' => 'Grebo',
                          'grc' => 'Ancient Greek',
                          'gre' => 'Greek',
                          'grn' => 'Guarani',
                          'gsw' => 'Swiss German',
                          'guj' => 'Gujarati',
                          'gwi' => 'Gwich`in',
                          'hai' => 'Haida',
                          'hat' => 'Haitian',
                          'hau' => 'Hausa',
                          'haw' => 'Hawaiian',
                          'heb' => 'Hebrew',
                          'her' => 'Herero',
                          'hil' => 'Hiligaynon',
                          'him' => 'Himachali',
                          'hin' => 'Hindi',
                          'hit' => 'Hittite',
                          'hmn' => 'Hmong',
                          'hmo' => 'Hiri Motu',
                          'hsb' => 'Upper Sorbian',
                          'hun' => 'Hungarian',
                          'hup' => 'Hupa',
                          'iba' => 'Iban',
                          'ibo' => 'Igbo',
                          'ice' => 'Icelandic',
                          'ido' => 'Ido',
                          'iii' => 'Sichuan Yi',
                          'ijo' => 'Ijo',
                          'iku' => 'Inuktitut',
                          'ile' => 'Interlingue',
                          'ilo' => 'Iloko',
                          'ina' => 'Interlingua',
                          'inc' => 'Indic',
                          'ind' => 'Indonesian',
                          'ine' => 'Indo-European',
                          'inh' => 'Ingush',
                          'ipk' => 'Inupiaq',
                          'ira' => 'Iranian',
                          'iro' => 'Iroquoian',
                          'ita' => 'Italian',
                          'jav' => 'Javanese',
                          'jbo' => 'Lojban',
                          'jpn' => 'Japanese',
                          'jpr' => 'Judeo-Persian',
                          'jrb' => 'Judeo-Arabic',
                          'kaa' => 'Kara-Kalpak',
                          'kab' => 'Kabyle',
                          'kac' => 'Kachin',
                          'kal' => 'Kalaallisut',
                          'kam' => 'Kamba',
                          'kan' => 'Kannada',
                          'kar' => 'Karen',
                          'kas' => 'Kashmiri',
                          'kau' => 'Kanuri',
                          'kaw' => 'Kawi',
                          'kaz' => 'Kazakh',
                          'kbd' => 'Kabardian',
                          'kha' => 'Khasi',
                          'khi' => 'Khoisan',
                          'khm' => 'Central Khmer',
                          'kho' => 'Khotanese',
                          'kik' => 'Kikuyu',
                          'kin' => 'Kinyarwanda',
                          'kir' => 'Kirghiz',
                          'kmb' => 'Kimbundu',
                          'kok' => 'Konkani',
                          'kom' => 'Komi',
                          'kon' => 'Kongo',
                          'kor' => 'Korean',
                          'kos' => 'Kosraean',
                          'kpe' => 'Kpelle',
                          'krc' => 'Karachay-Balkar',
                          'krl' => 'Karelian',
                          'kro' => 'Kru languages',
                          'kru' => 'Kurukh',
                          'kua' => 'Kuanyama',
                          'kum' => 'Kumyk',
                          'kur' => 'Kurdish',
                          'kut' => 'Kutenai',
                          'lad' => 'Ladino',
                          'lah' => 'Lahnda',
                          'lam' => 'Lamba',
                          'lao' => 'Lao',
                          'lat' => 'Latin',
                          'lav' => 'Latvian',
                          'lez' => 'Lezghian',
                          'lim' => 'Limburgan',
                          'lin' => 'Lingala',
                          'lit' => 'Lithuanian',
                          'lol' => 'Mongo',
                          'loz' => 'Lozi',
                          'ltz' => 'Luxembourgish',
                          'lua' => 'Luba-Lulua',
                          'lub' => 'Luba-Katanga',
                          'lug' => 'Ganda',
                          'lui' => 'Luiseno',
                          'lun' => 'Lunda',
                          'luo' => 'Luo',
                          'lus' => 'Lushai',
                          'mac' => 'Macedonian',
                          'mad' => 'Madurese',
                          'mag' => 'Magahi',
                          'mah' => 'Marshallese',
                          'mai' => 'Maithili',
                          'mak' => 'Makasar',
                          'mal' => 'Malayalam',
                          'man' => 'Mandingo',
                          'mao' => 'Maori',
                          'map' => 'Austronesian',
                          'mar' => 'Marathi',
                          'mas' => 'Masai',
                          'may' => 'Malay',
                          'mdf' => 'Moksha',
                          'mdr' => 'Mandar',
                          'men' => 'Mende',
                          'mga' => 'Middle Irish',
                          'mic' => "Mi'kmaq",
                          'min' => 'Minangkabau',
                          'mis' => 'Unknown',
                          'mkh' => 'Mon-Khmer',
                          'mlg' => 'Malagasy',
                          'mlt' => 'Maltese',
                          'mnc' => 'Manchu',
                          'mni' => 'Manipuri',
                          'mno' => 'Manobo',
                          'moh' => 'Mohawk',
                          'mol' => 'Moldavian',
                          'mon' => 'Mongolian',
                          'mos' => 'Mossi',
                          'mul' => 'Multilingual',
                          'mun' => 'Munda',
                          'mus' => 'Creek',
                          'mwl' => 'Mirandese',
                          'mwr' => 'Marwari',
                          'myn' => 'Mayan',
                          'myv' => 'Erzya',
                          'nah' => 'Nahuatl',
                          'nai' => 'North American Indian',
                          'nap' => 'Neapolitan',
                          'nau' => 'Nauru',
                          'nav' => 'Navajo',
                          'nbl' => 'Ndebele',
                          'nde' => 'North Ndebele',
                          'ndo' => 'Ndonga',
                          'nds' => 'Low German',
                          'nep' => 'Nepali',
                          'new' => 'Nepal Bhasa',
                          'nia' => 'Nias',
                          'nic' => 'Niger-Kordofanian',
                          'niu' => 'Niuean',
                          'nno' => 'Norwegian Nynorsk',
                          'nob' => 'Norwegian Bokmål',
                          'nog' => 'Nogai',
                          'non' => 'Old Norse',
                          'nor' => 'Norwegian',
                          'nqo' => "N'Ko",
                          'nso' => 'Pedi',
                          'nub' => 'Nubian',
                          'nwc' => 'Classical Newari',
                          'nya' => 'Chichewa',
                          'nym' => 'Nyamwezi',
                          'nyn' => 'Nyankole',
                          'nyo' => 'Nyoro',
                          'nzi' => 'Nzima',
                          'oci' => 'Occitan',
                          'oji' => 'Ojibwa',
                          'ori' => 'Oriya',
                          'orm' => 'Oromo',
                          'osa' => 'Osage',
                          'oss' => 'Ossetian',
                          'ota' => 'Ottoman Turkish',
                          'oto' => 'Otomian',
                          'paa' => 'Papuan',
                          'pag' => 'Pangasinan',
                          'pal' => 'Pahlavi',
                          'pam' => 'Pampanga',
                          'pan' => 'Panjabi',
                          'pap' => 'Papiamento',
                          'pau' => 'Palauan',
                          'peo' => 'Old Persian',
                          'per' => 'Persian',
                          'phi' => 'Philippine',
                          'phn' => 'Phoenician',
                          'pli' => 'Pali',
                          'pol' => 'Polish',
                          'pon' => 'Pohnpeian',
                          'por' => 'Portuguese',
                          'pra' => 'Prakrit languages',
                          'pro' => 'Old Provençal',
                          'pus' => 'Pushto',
                          'que' => 'Quechua',
                          'raj' => 'Rajasthani',
                          'rap' => 'Rapanui',
                          'rar' => 'Rarotongan',
                          'roa' => 'Romance',
                          'roh' => 'Romansh',
                          'rom' => 'Romany',
                          'rum' => 'Romanian',
                          'run' => 'Rundi',
                          'rup' => 'Aromanian',
                          'rus' => 'Russian',
                          'sad' => 'Sandawe',
                          'sag' => 'Sango',
                          'sah' => 'Yakut',
                          'sai' => 'South American Indian',
                          'sal' => 'Salishan',
                          'sam' => 'Samaritan Aramaic',
                          'san' => 'Sanskrit',
                          'sas' => 'Sasak',
                          'sat' => 'Santali',
                          'scc' => 'Serbian',
                          'scn' => 'Sicilian',
                          'sco' => 'Scots',
                          'scr' => 'Croatian',
                          'sel' => 'Selkup',
                          'sem' => 'Semitic',
                          'sga' => 'Old Irish',
                          'sgn' => 'Sign Language',
                          'shn' => 'Shan',
                          'sid' => 'Sidamo',
                          'sin' => 'Sinhala',
                          'sio' => 'Siouan',
                          'sit' => 'Sino-Tibetan',
                          'sla' => 'Slavic',
                          'slo' => 'Slovak',
                          'slv' => 'Slovenian',
                          'sma' => 'Southern Sami',
                          'sme' => 'Northern Sami',
                          'smi' => 'Sami languages',
                          'smj' => 'Lule Sami',
                          'smn' => 'Inari Sami',
                          'smo' => 'Samoan',
                          'sms' => 'Skolt Sami',
                          'sna' => 'Shona',
                          'snd' => 'Sindhi',
                          'snk' => 'Soninke',
                          'sog' => 'Sogdian',
                          'som' => 'Somali',
                          'son' => 'Songhai',
                          'sot' => 'Southern Sotho',
                          'spa' => 'Spanish',
                          'srd' => 'Sardinian',
                          'srn' => 'Sranan Tongo',
                          'srr' => 'Serer',
                          'ssa' => 'Nilo-Saharan',
                          'ssw' => 'Swati',
                          'suk' => 'Sukuma',
                          'sun' => 'Sundanese',
                          'sus' => 'Susu',
                          'sux' => 'Sumerian',
                          'swa' => 'Swahili',
                          'swe' => 'Swedish',
                          'syc' => 'Classical Syriac',
                          'syr' => 'Syriac',
                          'tah' => 'Tahitian',
                          'tai' => 'Tai',
                          'tam' => 'Tamil',
                          'tat' => 'Tatar',
                          'tel' => 'Telugu',
                          'tem' => 'Timne',
                          'ter' => 'Tereno',
                          'tet' => 'Tetum',
                          'tgk' => 'Tajik',
                          'tgl' => 'Tagalog',
                          'tha' => 'Thai',
                          'tib' => 'Tibetan',
                          'tig' => 'Tigre',
                          'tir' => 'Tigrinya',
                          'tiv' => 'Tiv',
                          'tkl' => 'Tokelau',
                          'tlh' => 'Klingon',
                          'tli' => 'Tlingit',
                          'tmh' => 'Tamashek',
                          'tog' => 'Tonga',
                          'ton' => 'Tonga',
                          'tpi' => 'Tok',
                          'tsi' => 'Tsimshian',
                          'tsn' => 'Tswana',
                          'tso' => 'Tsonga',
                          'tuk' => 'Turkmen',
                          'tum' => 'Tumbuka',
                          'tup' => 'Tupi',
                          'tur' => 'Turkish',
                          'tut' => 'Altaic',
                          'tvl' => 'Tuvalu',
                          'twi' => 'Twi',
                          'tyv' => 'Tuvinian',
                          'udm' => 'Udmurt',
                          'uga' => 'Ugaritic',
                          'uig' => 'Uighur',
                          'ukr' => 'Ukrainian',
                          'umb' => 'Umbundu',
                          'und' => 'Undetermined',
                          'urd' => 'Urdu',
                          'uzb' => 'Uzbek',
                          'vai' => 'Vai',
                          'ven' => 'Venda',
                          'vie' => 'Vietnamese',
                          'vol' => 'Volapük',
                          'vot' => 'Votic',
                          'wak' => 'Wakashan',
                          'wal' => 'Walamo',
                          'war' => 'Waray',
                          'was' => 'Washo',
                          'wel' => 'Welsh',
                          'wen' => 'Sorbian',
                          'wln' => 'Walloon',
                          'wol' => 'Wolof',
                          'xal' => 'Kalmyk',
                          'xho' => 'Xhosa',
                          'yao' => 'Yao',
                          'yap' => 'Yapese',
                          'yid' => 'Yiddish',
                          'yor' => 'Yoruba',
                          'ypk' => 'Yupik',
                          'zap' => 'Zapotec',
                          'zbl' => 'Blissymbols',
                          'zen' => 'Zenaga',
                          'zha' => 'Zhuang',
                          'znd' => 'Zande',
                          'zul' => 'Zulu',
                          'zun' => 'Zuni',
                          'zza' => 'Zaza');
    
    function getLanguage($code)
    {
        if (isset($this->lang[$code])) {
            return $this->lang[$code];
        } else {
            return 'Unknown';
        }
    }

    function getCode($lang)
    {
        $keys = array_keys($this->lang, $lang);
        return $keys[0];
    }
}
?>