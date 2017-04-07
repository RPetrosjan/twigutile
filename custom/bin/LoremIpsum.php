<?php
/**
 * Created by PhpStorm.
 * User: rpetrosjan
 * Date: 07/04/2017
 * Time: 16:31
 */

class LoremIpsum extends Twig_Extension{

    /**
     * @var array
     */
    protected $words = array(
        'lorem',        'ipsum',        'dolor',        'sit',          'amet',         'consectetur',
        'adipiscing',   'elit',         'curabitur',    'vel',          'hendrerit',    'libero',
        'eleifend',     'blandit',      'nunc',         'ornare',       'odio',         'ut',
        'orci',         'gravida',      'imperdiet',    'nullam',       'purus',        'lacinia',
        'a',            'pretium',      'quis',         'congue',       'praesent',     'sagittis',
        'laoreet',      'auctor',       'mauris',       'non',          'velit',        'eros',
        'dictum',       'proin',        'accumsan',     'sapien',       'nec',          'massa',
        'volutpat',     'venenatis',    'sed',          'eu',           'molestie',     'lacus',
        'quisque',      'porttitor',    'ligula',       'dui',          'mollis',       'tempus',
        'at',           'magna',        'vestibulum',   'turpis',       'ac',           'diam',
        'tincidunt',    'id',           'condimentum',  'enim',         'sodales',      'in',
        'hac',          'habitasse',    'platea',       'dictumst',     'aenean',       'neque',
        'fusce',        'augue',        'leo',          'eget',         'semper',       'mattis',
        'tortor',       'scelerisque',  'nulla',        'interdum',     'tellus',       'malesuada',
        'rhoncus',      'porta',        'sem',          'aliquet',      'et',           'nam',
        'suspendisse',  'potenti',      'vivamus',      'luctus',       'fringilla',    'erat',
        'donec',        'justo',        'vehicula',     'ultricies',    'varius',       'ante',
        'primis',       'faucibus',     'ultrices',     'posuere',      'cubilia',      'curae',
        'etiam',        'cursus',       'aliquam',      'quam',         'dapibus',      'nisl',
        'feugiat',      'egestas',      'class',        'aptent',       'taciti',       'sociosqu',
        'ad',           'litora',       'torquent',     'per',          'conubia',      'nostra',
        'inceptos',     'himenaeos',    'phasellus',    'nibh',         'pulvinar',     'vitae',
        'urna',         'iaculis',      'lobortis',     'nisi',         'viverra',      'arcu',
        'morbi',        'pellentesque', 'metus',        'commodo',      'ut',           'facilisis',
        'felis',        'tristique',    'ullamcorper',  'placerat',     'aenean',       'convallis',
        'sollicitudin', 'integer',      'rutrum',       'duis',         'est',          'etiam',
        'bibendum',     'donec',        'pharetra',     'vulputate',    'maecenas',     'mi',
        'fermentum',    'consequat',    'suscipit',     'aliquam',      'habitant',     'senectus',
        'netus',        'fames',        'quisque',      'euismod',      'curabitur',    'lectus',
        'elementum',    'tempor',       'risus',        'cras'
    );


    public function getFilters()
    {
        return array(
            new Twig_SimpleFilter(
                'loremIpsum', array($this, 'LoremIpsumGenerator'), array('is_safe' => array('html'))
            ),
        );
    }


    /**
     * Set an array of words. Removes existing words.
     *
     * @codeCoverageIgnore
     *
     * @param $words
     */
    public function setWords(array $words)
    {
        $this->words = $words;
    }

    /**
     * Add a single or array of multiple words to the generator.
     *
     * @codeCoverageIgnore
     *
     * @param string|array $words
     */
    public function addWords($words)
    {
        if (is_array($words)) {
            $this->words = array_merge($this->words, $words);

            return;
        }

        $this->words[] = $words;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return array
     */
    public function getWords()
    {
        return $this->words;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param float $paragraphMean
     */
    public function setParagraphMean($paragraphMean)
    {
        $this->paragraphMean = (float) $paragraphMean;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return float
     */
    public function getParagraphMean()
    {
        return $this->paragraphMean;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param float $paragraphStDev
     */
    public function setParagraphStDev($paragraphStDev)
    {
        $this->paragraphStDev = (float) $paragraphStDev;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return float
     */
    public function getParagraphStDev()
    {
        return $this->paragraphStDev;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param float $sentenceMean
     */
    public function setSentenceMean($sentenceMean)
    {
        $this->sentenceMean = (float) $sentenceMean;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return float
     */
    public function getSentenceMean()
    {
        return $this->sentenceMean;
    }

    /**
     * @codeCoverageIgnore
     *
     * @param float $sentenceStDev
     */
    public function setSentenceStDev($sentenceStDev)
    {
        $this->sentenceStDev = (float) $sentenceStDev;
    }

    /**
     * @codeCoverageIgnore
     *
     * @return float
     */
    public function getSentenceStDev()
    {
        return $this->sentenceStDev;
    }

    /**
     * Get an array of random words from $words
     *
     * @param int $count
     * @return array
     */
    public function getRandomWords($count)
    {
        $words = array();

        for ($i = 0; $i < $count; $i++) {
            $word = $this->words[array_rand($this->words)];
            if ($i > 0 && $words[$i - 1] === $word) {
                $i--;
                continue;
            }

            $words[] = $word;
        }

        return $words;
    }

    /**
     * Get an array of sentences
     *
     * @param int $count
     * @return array
     */
    public function getSentences($count)
    {
        $sentences = array();

        for ($i = 0; $i < $count; $i++) {
            $wordCount = (int) Statistics::gauss_ms($this->sentenceMean, $this->sentenceStDev);
            $sentence = $this->getRandomWords($wordCount);
            $sentences[] = $this->toSentence($sentence);
        }

        return $sentences;
    }

    /**
     * Get an values of how many et html tag
     *
     * @param int $count
     * @param string   $htmltag
     * @return lorem ipsum with paragraph en html form
    */
    public function LoremIpsumGenerator($count,$htmltag)
    {
        $paragraphs = array();
        for ($i = 0; $i < $count; $i++) {
            ///        $number = Statistics::gauss_ms($this->paragraphMean, $this->paragraphStDev);
            $number = 5;
            $sentences = $this->getSentences($number);
            $paragraphs[] = implode(' ', $sentences);
        }
        return implode($htmltag, $paragraphs);
    }
}