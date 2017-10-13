<div style="overflow-x:auto;white-space:nowrap">
  <table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center" style="vertical-align:middle">@lang('report.tax.input.table.header.invoice_date')</th>
            <th class="text-center" style="vertical-align:middle">@lang('report.tax.input.table.header.invoice_no')</th>
            <th class="text-center" style="vertical-align:middle">@lang('report.tax.input.table.header.detail')</th>
            <th class="text-center" style="vertical-align:middle">@lang('report.tax.input.table.header.qty')</th>
            <th class="text-center" style="vertical-align:middle">@lang('report.tax.input.table.header.unit_price')</th>
            <th class="text-center" style="vertical-align:middle">@lang('report.tax.input.table.header.tax_base')</th>
            <th class="text-center" style="vertical-align:middle">@lang('report.tax.input.table.header.gst')</th>
            <th class="text-center" style="vertical-align:middle">@lang('report.tax.input.table.header.grand_total')</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for="taxInput in taxesInput" v-cloak>
            <td class="text-center">@{{ taxInput.invoiceDate }}</td>
            <td class="text-center">@{{ taxInput.invoiceNo }}</td>
            <td class="text-center">@{{ taxInput.detail }}</td>
            <td class="text-center">@{{ taxInput.qty }}</td>
            <td class="text-right">@{{ numeral(taxInput.unitPrice).format() }}</td>
            <td class="text-right">@{{ numeral(taxInput.taxBase).format() }}</td>
            <td class="text-right">@{{ numeral(taxInput.gst).format() }}</td>
            <td class="text-right">@{{ numeral(taxInput.taxBase + taxInput.gst + taxInput.luxuryTax).format() }}</td>
        </tr>
        <tr>
            <td class="text-center" colspan="8" v-if="taxesInput.length == 0">@lang('labels.DATA_NOT_FOUND')</td>
        </tr>
    </tbody>
    <tfoot v-cloak>
        <tr>
            <td class="text-right" colspan="6">Total</td>
            <td class="text-right">@{{ numeral(totalGstInput).format() }}</td>
            <td class="text-right">@{{ numeral(grandTotalInput).format() }}</td>
        </tr>
    </tfoot>
  </table>
  <div class="clearfix">
    <ul class="pagination pagination-sm no-margin pull-right">
      <li><a href="{{ route('db.report.tax', [ 'year' => $year - 1, 'month' => 12 ]) }}">{{ $year - 1 }}</a></li>
      @foreach ($months as $key => $value)
      <li class="{{ $month == $key ? 'active' : '' }}">
        @if ($loop->first)
        <a href="{{ route('db.report.tax', [ 'year' => $year, 'month' => $key ]) }}">{{ $year }} - {{ $key }}</a>
        @else
        <a href="{{ route('db.report.tax', [ 'year' => $year, 'month' => $key ]) }}">{{ $key }}</a>
        @endif
      </li>
      @endforeach
      <li><a href="{{ route('db.report.tax', [ 'year' => $year + 1, 'month' => 1 ]) }}">{{ $year + 1 }}</a></li>
    </ul>
  </div>
</div>
