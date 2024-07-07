
# First Init
echo "# shop" >> README.md
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/mohammedib245/shop.git
git push -u origin main



# push To remote repo
git remote add origin https://github.com/mohammedib245/shop.git
git branch -M main
git push -u origin main

# check status 
git status
# check diffrent
 git diff
# Make Branch
git branch Name

# move to branch
git checkout Name

# add files 
git add .  | git add --all

# commit to stage 
git commit -m "Your Message"

# Must Move to main branch To push and merge the branch into main bracnh
git checkout Name 

# push to remote repo  main
git push -u origin main 

# merge 
git merge BranchName



# HTTPs
https://github.com/mohammedib245/shop.git
# SSH
git@github.com:mohammedib245/shop.git