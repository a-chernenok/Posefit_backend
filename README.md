# PoseFit Backend
CHERNENOK OLEKSANDR

Το PoseFit Backend είναι η υπηρεσία API που διαχειρίζεται τα δεδομένα της εφαρμογής PoseFit. Αναπτύχθηκε σε PHP με βάση δεδομένων MySQL και λειτουργεί ως το κεντρικό σημείο για την αποθήκευση και ανάκτηση δεδομένων ασκήσεων.

---

### **2. Τεχνολογίες Χρησιμοποιούμενες**

* **PHP:** Έκδοση 8.2.4
* **MySQL:** (Ενσωματωμένο στο XAMPP)
* **XAMPP:** Περιβάλλον τοπικού server (Apache, MySQL, PHP)

---

### **3. Προαπαιτούμενα (Prerequisites)**

Για να εκτελέσετε το backend τοπικά, βεβαιωθείτε ότι έχετε εγκατεστημένο το **XAMPP** στον υπολογιστή σας.

---

### **4. Οδηγίες Εγκατάστασης (Installation)**

Ακολουθήστε τα παρακάτω βήματα για να εγκαταστήσετε και να ρυθμίσετε το backend:

1.  **Λήψη Κώδικα:**
    Ανοίξτε ένα terminal και εκτελέστε:
    ```bash
    git clone [https://github.com/a-chernenok/Posefit_backend.git](https://github.com/a-chernenok/Posefit_backend.git)
    ```
2.  **Ρύθμιση XAMPP:**
    * Εγκαταστήστε το XAMPP αν δεν το έχετε ήδη.
    * Ανοίξτε το XAMPP Control Panel και εκκινήστε τα modules `Apache` και `MySQL`.
3.  **Αντιγραφή Αρχείων:**
    * Αντιγράψτε τον φάκελο `Posefit_backend` (από το βήμα 4.1) μέσα στον φάκελο `htdocs` της εγκατάστασης του XAMPP (π.χ., `C:\xampp\htdocs\Posefit_backend`).
4.  **Δημιουργία Βάσης Δεδομένων:**
    * Ανοίξτε τον browser σας και επισκεφθείτε `http://localhost/phpmyadmin/`.
    * Δημιουργήστε μια νέα βάση δεδομένων με το όνομα **`posefit_db`**.
    * Επιλέξτε την `posefit_db`, πηγαίνετε στην καρτέλα `Import`, επιλέξτε το αρχείο **`posefit_db.sql`** (βρίσκεται στον φάκελο `Posefit_backend`) και πατήστε `Go` για εισαγωγή.
5.  **Ρυθμίσεις Σύνδεσης Βάσης Δεδομένων:**
    * Οι ρυθμίσεις σύνδεσης βρίσκονται στο αρχείο `db_connect.php` εντός του φακέλου `Posefit_backend`. Είναι προρυθμισμένες για τις προεπιλογές του XAMPP (`localhost`, `root`, κενός κωδικός, `posefit_db`).

---

### **5. Οδηγίες Εκτέλεσης (How to Run)**

1.  Βεβαιωθείτε ότι τα modules `Apache` και `MySQL` είναι σε λειτουργία στο XAMPP Control Panel.
2.  Το backend λειτουργεί ως API και εξυπηρετεί αιτήματα από την Android εφαρμογή. Δεν υπάρχει ξεχωριστό "run" βήμα πέρα από την εκκίνηση του XAMPP.

---

### **6. API Endpoints (Παράδειγμα)**

* `http://localhost/Posefit_backend/save_exercise.php`: Χρησιμοποιείται για την αποθήκευση δεδομένων άσκησης.

---