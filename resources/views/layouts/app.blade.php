<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Menu</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .navbar-custom {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: white;
            padding: 0.75rem 1rem;
        }
        .btn-custom {
            transition: all 0.2s ease;
        }
        .btn-cart {
            position: relative;
        }
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #fff;
            color: #06b6d4;
            border-radius: 50%;
            padding: 0.25rem 0.5rem;
            font-size: 0.7rem;
            font-weight: bold;
        }
        .dropdown-menu-custom {
            min-width: 20rem;
            padding: 0.5rem 0;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
        }
        .dropdown-item-custom {
            padding: 0.5rem 1rem;
            border-bottom: 1px solid #e5e7eb;
        }
        .dropdown-item-custom:last-child {
            border-bottom: none;
        }
        .cart-empty {
            padding: 1rem;
            text-align: center;
            color: #9ca3af;
        }
        .cart-item {
            padding: 0.75rem 1rem;
        }
        .cart-item:not(:last-child) {
            border-bottom: 1px solid #e5e7eb;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold fs-4" href="#">Food Menu</a>
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('menus.create') }}" class="btn btn-primary btn-custom">
                    Add New Menu
                </a>
                <a href="{{ route('menus.index') }}" class="text-decoration-none text-dark fw-medium">
                    Menu
                </a>
                <!-- Cart Dropdown -->
                <div class="dropdown">
                    <button
                        id="navbarDropdown"
                        class="btn btn-info btn-cart position-relative d-flex align-items-center gap-2"
                        type="button"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                    >
                        <span>Cart</span>
                        <span class="cart-badge">{{ count(session('cart', [])) }}</span>
                        <svg xmlns="http://www/www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                        </svg>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom shadow" aria-labelledby="navbarDropdown">
                        @if(!empty(session('cart')))
                            @foreach(session('cart', []) as $key => $value)
                                <li>
                                    <div class="cart-item">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-0 fw-medium">{{ $value['name'] }}</p>
                                            @if(isset($value['price']))
                                                <span class="text-muted">${{ number_format($value['price'], 2) * ($value['quantity'] ?? 0)}}</span>
                                                {{-- <td>${{ (float)($item['price'] ?? 0) * (int)($item['quantity'] ?? 0) }}</td>--}}
                                            @endif
                                        </div>
                                        @if(isset($value['quantity']))
                                            <p class="mb-0 text-muted small">Qty: {{ $value['quantity'] }}</p>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                            <li>
                                <a href="{{ route('cart') }}" class="btn btn-primary w-100 btn-custom">
                                        View Cart
                                </a>
                            </li>
                        @else
                            <li>
                                <div class="cart-empty">
                                    <p class="mb-0">Your cart is empty</p>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    <div class="container py-4">
        @yield('content')
    </div>
    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
