s = ''.join(filter(str.isalpha, input()))
vowels='AEIOUaeiou'
c=0
for i in s:
    if i.isupper():
        if i in vowels:
            c=c+((ord(i)-64)*(ord(i)-64))
        else:
            c=c+(ord(i)-64)+5
    else:
        if i in vowels:
            c=c+(ord(i)-96)+10
        else:
            c=c+(ord(i)-96)        
print(c)
