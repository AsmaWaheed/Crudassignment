# Connect to the database
conn = sqlite3.connect('students.db')
cursor = conn.cursor()

# Create a table to store student records
cursor.execute('''
    CREATE TABLE IF NOT EXISTS students (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        age INTEGER NOT NULL,
        grade TEXT NOT NULL
    )
''')
conn.commit()

# Function to create a new student record
def create_student(name, age, grade):
    cursor.execute('INSERT INTO students (name, age, grade) VALUES (?, ?, ?)', (name, age, grade))
    conn.commit()
    print("Student record created successfully.")

# Function to retrieve all student records
def read_students():
    cursor.execute('SELECT * FROM students')
    rows = cursor.fetchall()
    for row in rows:
        print(f"ID: {row[0]}, Name: {row[1]}, Age: {row[2]}, Grade: {row[3]}")

# Function to update a student record
def update_student(student_id, name, age, grade):
    cursor.execute('UPDATE students SET name=?, age=?, grade=? WHERE id=?', (name, age, grade, student_id))
    conn.commit()
    print("Student record updated successfully.")

# Function to delete a student record
def delete_student(student_id):
    cursor.execute('DELETE FROM students WHERE id=?', (student_id,))
    conn.commit()
    print("Student record deleted successfully.")

# Example usage
create_student("John Doe", 18, "A")
create_student("Jane Smith", 19, "B")
read_students()

update_student(1, "John Doe", 19, "B")
delete_student(2)
read_students()

# Close the database connection
conn.close()
