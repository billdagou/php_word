<?php
namespace Dagou\PhpWord\ViewHelpers\Http\Download;

use Dagou\DagouFluid\ViewHelpers\Http\DownloadViewHelper;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Settings;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class WordViewHelper extends AbstractViewHelper {
    const DEFAULT_WRITER = 'Word2007';

    protected static array $writers = [
        'HTML' => 'html',
        'ODText' => 'odt',
        'PDF' => 'pdf',
        'RTF' => 'rtf',
        'Word2007' => 'docx',
    ];
    protected static array $mimeTypes = [
        'docx' => '',
        'html' => 'text/html',
        'odt' => 'application/vnd.oasis.opendocument.text',
        'pdf' => 'application/pdf',
        'rtf' => 'application/rtf',
    ];

    public function initializeArguments() {
        $this->registerArgument('phpWord', PhpWord::class, 'PHPWord instance');
        $this->registerArgument('writer', 'string', 'Writer name', FALSE, self::DEFAULT_WRITER);
    }

    /**
     * @return string
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    public function render(): string {
        $writerName = $this->getWriterName();

        $this->viewHelperVariableContainer->add(
            DownloadViewHelper::class,
            'filename',
            ($this->viewHelperVariableContainer->get(DownloadViewHelper::class, 'filename') ?: 'Document')
                .'.'.self::$writers[$writerName]
        );
        $this->viewHelperVariableContainer->add(DownloadViewHelper::class, 'mimeType', self::$mimeTypes[self::$writers[$writerName]]);

        $tempFilename = tempnam(Settings::getTempDir(), 'PHPWord');

        IOFactory::createWriter($this->arguments['phpWord'] ?? $this->renderChildren(), $writerName)
            ->save($tempFilename);

        $content = file_get_contents($tempFilename);

        @unlink($tempFilename);

        return $content;
    }

    /**
     * @return string
     */
    protected function getWriterName(): string {
        return in_array($this->arguments['writer'], array_keys(self::$writers)) ? $this->arguments['writer'] : self::DEFAULT_WRITER;
    }
}