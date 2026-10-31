Part G

G1: Which column did you turn into a table, and why that one and not another?
I turned the type column into a separate types lookup table because medicine types (Tablet, Capsule, Syrup) come from a fixed list, repeat across many medicine records, and could eventually need their own attributes (like dosage instructions or storage rules).

G2: What number did screenshot 6 show, and why exactly that number?

It showed 6 queries because of the N+1 query problem before adding with('type'). Laravel ran 1 query to fetch all 5 medicines from the medicines table, and then ran 5 additional queries (1 for each of the 5 rows in the Blade loop) every time $medicine->type->name was accessed.

G3: Your belongsTo method is named in the singular. What would break if you made it plural?

Laravel automatically figures out which foreign key column to use by taking your method name and adding _id to the end of it. If I named the method types() in the plural instead of type(), Laravel would go looking for a column called types_id instead of type_id, fail to find the relationship, and crash the page when trying to display the type's name.