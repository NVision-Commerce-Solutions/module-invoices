<?php
namespace Commerce365\Invoices\Block;

use Commerce365\Core\Block\AbstractList;
use Commerce365\Core\Service\GetSalesDocuments;
use Commerce365\Core\Service\SalesDocumentInterface;
use Magento\Framework\View\Element\Template\Context;

class InvoiceList extends AbstractList
{
    const URL = 'invoices/invoicelist';
    const VIEW_URL = 'invoices/invoicedetails';

    private GetSalesDocuments $getSalesDocuments;

    public function __construct(
        Context $context,
        GetSalesDocuments $getSalesDocuments,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->getSalesDocuments = $getSalesDocuments;
    }

    public function getInvoices()
    {
        $query = $this->processQuery([
            'tableNo' => SalesDocumentInterface::INVOICE_TABLE_NO,
            'documentType' => 0
        ]);

        return $this->getSalesDocuments->execute($query);
    }
}
