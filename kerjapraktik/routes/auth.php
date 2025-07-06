# Data pengguna (username dan password)
pengguna_data = {
    "admin": "admin123",
    "user1": "password1",
    "user2": "password2"
}

def login():
    print("=== Program Login ===")
    username = input("Masukkan username: ")
    password = input("Masukkan password: ")

    # Mengecek apakah username ada dalam data pengguna
    if username in pengguna_data:
        # Mengecek apakah password yang dimasukkan sesuai dengan yang ada di data pengguna
        if pengguna_data[username] == password:
            print(f"Selamat datang, {username}!")
        else:
            print("Password salah. Coba lagi.")
    else:
        print("Username tidak ditemukan. Coba lagi.")

def main():
    while True:
        login()  # Menjalankan fungsi login
        
        pilihan = input("Apakah Anda ingin mencoba lagi? (y/n): ")
        if pilihan.lower() != "y":
            print("Terima kasih! Program selesai.")
            break

if __name__ == "__main__":
    main()
