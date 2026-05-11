# 🛒 Detailed Feature Documentation: Shopping Cart System

This document serves as the **Single Source of Truth** for the Shopping Cart features. Candidates are expected to design their test cases and scenarios based on the requirements listed below.

---

## 1. Feature Overview
The Shopping Cart system allows customers to manage their intended purchases. It consists of a backend API for data management and a web-based user interface for customer interaction.

## 2. Detailed Functional Requirements

### 2.1 Add to Cart (API & Backend)
**Objective:** Add a specific quantity of a product to a user's digital cart.
- **Endpoint:** `POST /api/cart/add`
- **Mandatory Fields:**
    - `product_id`: Must be a valid ID from the `products` table.
    - `quantity`: Must be a numeric value.
    - `user_id` (Optional for simulation): Used to identify the owner of the cart.
- **Business Logic & Validation:**
    - **Quantity Validation:** The system must reject any quantity that is not a positive integer (e.g., 0, -1, or non-numeric strings).
    - **Stock Verification:** Before adding to the cart, the system **MUST** verify that `requested_quantity <= available_stock` in the database.
    - **Error Handling:** If validation fails or stock is insufficient, the API must return a clear error message with an appropriate HTTP status code (e.g., 422 Unprocessable Entity).
    - **Update Logic:** If the item already exists in the user's cart, adding it again should increment the existing quantity, provided the total does not exceed stock.

### 2.2 View Cart (API & Web UI)
**Objective:** Display a summary of all items the user intends to buy.
- **Endpoint:** `GET /api/cart?user_id=1`
- **UI Path:** `/cart`
- **Data Presentation Requirements:**
    - **Product Details:** Must show the Product Name, Unit Price, and current Quantity.
    - **Currency Formatting:** All prices (Unit Price and Total) **MUST** be displayed in USD format (e.g., `$ 150.00`). Raw numbers (e.g., `150000`) are considered a UI flaw.
    - **Calculations:** The system must accurately calculate the `Subtotal` (Price * Quantity) and the `Grand Total` for the entire cart.
- **Technical/Performance Requirement:**
    - The system should retrieve product details efficiently. Excessive database queries (N+1 problem) are considered a technical debt.

### 2.3 User Interface (Web UI)
- **Input Controls:** The quantity adjustment field should be optimized for numeric input to minimize user error.
- **Action Buttons:** The "Checkout" button must be functional and clearly labeled.
- **Automation Friendliness:** Key elements (buttons, inputs, labels) should have reliable attributes (e.g., `id` or `data-testid`) to support stable automated testing.

---

## 3. Database Schema Reference
Use these tables for your SQL verification challenges:

- **`products`**: `id` (PK), `name`, `price`, `stock` (Integer).
- **`carts`**: `id` (PK), `user_id` (FK), `product_id` (FK), `quantity` (Integer).
- **`orders`**: `id` (PK), `user_id` (FK), `total_price` (Decimal), `status` (String).

---

## 4. Expected Candidate Deliverables
Candidates should use this documentation to:
1. Identify functional and non-functional gaps in the current implementation.
2. Design comprehensive **Test Scenarios** (must cover both **Positive** and **Negative** cases).
3. Draft **Bug Reports** for any identified issues (must include **Evidence** such as screenshots or logs).
4. Provide **SQL Queries** used to verify data integrity (e.g., finding negative quantities or verifying stock).
