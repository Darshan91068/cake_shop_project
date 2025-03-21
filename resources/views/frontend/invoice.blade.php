<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/invoice_css/style.css') }}" type="text/css" media="all" />
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '',
                    text: '{{ session('success') }}',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
    <div>
        <div class="py-4">
            <div class="px-14 py-6">
                <table class="w-full border-collapse border-spacing-0">
                    <tbody>
                        <tr>
                            <td class="w-full align-top">
                                <div>
                                    <img src="{{ asset('frontend/img/logo-2.png') }}" class="h-12" />
                                </div>
                            </td>

                            <td class="align-top">
                                <div class="text-sm">
                                    <table class="border-collapse border-spacing-0">
                                        <tbody>
                                            <tr>
                                                <td class="border-r pr-4">
                                                    <div>
                                                        <p class="whitespace-nowrap text-slate-400 text-right">Date</p>
                                                        <p id="currentDate"
                                                            class="whitespace-nowrap font-bold text-main text-right">
                                                        </p>
                                                    </div>
                                                </td>
                                                {{-- <td class="pl-4">
                                                    <div>
                                                        <p class="whitespace-nowrap text-slate-400 text-right">Invoice #
                                                        </p>
                                                        <p class="whitespace-nowrap font-bold text-main text-right">
                                                            BRA-00335</p>
                                                    </div>
                                                </td> --}}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="bg-slate-100 px-14 py-6 text-sm">
                <table class="w-full border-collapse border-spacing-0">
                    <tbody>
                        <tr>
                            <td class="w-1/2 align-top">
                                <div class="text-sm text-neutral-600">
                                    <p class="font-bold">Supplier Company INC</p>
                                    <p>Number: 23456789</p>
                                    <p>VAT: 23456789</p>
                                    <p>6622 Abshire Mills</p>
                                    <p>Port Orlofurt, 05820</p>
                                    <p>United States</p>
                                </div>
                            </td>
                            @if (isset($order) && $order)
                                <td class="w-1/2 align-top text-right">
                                    <div class="text-sm text-neutral-600">
                                        <p class="font-bold">Customer Detail</p>
                                        <p>Number: {{ $order->mobile_number }}</p>
                                        <p>Email: {{ $order->email }}</p>
                                        <p>Address: {{ $order->address }}</p>
                                        <p>City: {{ $order->city }}</p>
                                        <p>Pincode: {{ $order->pincode }}</p>
                                        {{-- <p>Total: ₹{{ number_format($order->main_total, 2) }}</p> --}}
                                    </div>
                                </td>
                            @else
                                <p>No order found</p>
                            @endif

                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="px-14 py-10 text-sm text-neutral-700">
                <table class="w-full border-collapse border-spacing-0">
                    <thead>
                        <tr>
                            <td class="border-b-2 border-main pb-3 pl-3 font-bold text-main">#</td>
                            <td class="border-b-2 border-main pb-3 pl-2 font-bold text-main">Product details</td>
                            <td class="border-b-2 border-main pb-3 pl-2 text-right font-bold text-main">Price</td>
                            <td class="border-b-2 border-main pb-3 pl-2 text-center font-bold text-main">Qty.</td>
                            <td colspan="3"
                                class="border-b-2 border-main pb-3 pl-2 pr-3 text-right font-bold text-main">Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        @if (session()->has('checkout_data'))
                            @php
                                $checkoutData = session('checkout_data');
                                $products = $checkoutData['products'];
                                $grandTotal = 0;
                                $gstPercentage = 18; // 18% GST
                                $counter = 1;
                            @endphp

                            @foreach ($products as $product)
                                @php
                                    $productTotal = $product['pro_price'] * $product['pro_qty'];
                                    $grandTotal += $productTotal;
                                @endphp
                                <tr>
                                    <td class="border-b py-3 pl-3">{{ $counter++ }}.</td> <!-- Auto-increment -->
                                    <td class="border-b py-3 pl-2">{{ $product['pro_name'] }}</td>
                                    <td class="border-b py-3 pl-2 text-right">
                                        Rs.{{ number_format($product['pro_price'], 2) }}</td>
                                    <td class="border-b py-3 pl-2 text-center">{{ $product['pro_qty'] }}</td>
                                    <td class="border-b py-3 pl-2 text-right">Rs.{{ number_format($productTotal, 2) }}
                                    </td>
                                </tr>
                            @endforeach

                            @php
                                $gstAmount = ($grandTotal * $gstPercentage) / 100;
                                $finalTotal = $grandTotal + $gstAmount;
                            @endphp
                        @else
                            <p>No checkout data found.</p>
                        @endif

                        <tr>
                            <td colspan="7">
                                <table class="w-full border-collapse border-spacing-0">
                                    <tbody>
                                        <tr>
                                            <td class="w-full"></td>
                                            <td>
                                                <table class="w-full border-collapse border-spacing-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="p-3">
                                                                <div class="whitespace-nowrap text-slate-400">Subtotal:
                                                                </div>
                                                            </td>
                                                            <td class="p-3 text-right">
                                                                <div class="whitespace-nowrap font-bold text-main">
                                                                    Rs.{{ number_format($grandTotal, 2) }}</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="p-3">
                                                                <div class="whitespace-nowrap text-slate-400">GST
                                                                    ({{ $gstPercentage }}%):</div>
                                                            </td>
                                                            <td class="p-3 text-right">
                                                                <div class="whitespace-nowrap font-bold text-main">
                                                                    Rs.{{ number_format($gstAmount, 2) }}</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="bg-main p-3">
                                                                <div class="whitespace-nowrap font-bold text-white">
                                                                    Total:</div>
                                                            </td>
                                                            <td class="bg-main p-3 text-right">
                                                                <div class="whitespace-nowrap font-bold text-white">
                                                                    Rs.{{ number_format($finalTotal, 2) }}</div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
            {{-- <tr>
                                                            <td class="border-b p-3">
                                                                <div class="whitespace-nowrap text-slate-400">Net total:
                                                                </div>
                                                            </td>
                                                            <td class="border-b p-3 text-right">
                                                                <div class="whitespace-nowrap font-bold text-main">
                                                                    $320.00</div>
                                                            </td>
                                                        </tr> --}}

            <a href="{{ route('home') }}" class="bg-main"
                style="padding: 10px 20px; color:white; text-align: center;">Home </a>
            {{-- <div class="px-14 text-sm text-neutral-700">
                <p class="text-main font-bold">PAYMENT DETAILS</p>
                <p>Banks of Banks</p>
                <p>Bank/Sort Code: 1234567</p>
                <p>Account Number: 123456678</p>
                <p>Payment Reference: BRA-00335</p>
            </div>

            <div class="px-14 py-10 text-sm text-neutral-700">
                <p class="text-main font-bold">Notes</p>
                <p class="italic">Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                    industries
                    for previewing layouts and visual mockups.</p>
                </dvi>

                <footer class="fixed bottom-0 left-0 bg-slate-100 w-full text-neutral-600 text-center text-xs py-3">
                    Supplier Company
                    <span class="text-slate-300 px-2">|</span>
                    info@company.com
                    <span class="text-slate-300 px-2">|</span>
                    +1-202-555-0106
                </footer>
            </div> --}}
        </div>
        <script>
            const today = new Date();
            const formattedDate = today.toLocaleDateString('en-GB'); // You can change the format as needed
            document.getElementById("currentDate").textContent = formattedDate;
        </script>
</body>

</html>
